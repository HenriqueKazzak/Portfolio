// kudos to https://github.com/DeuxVis/Lora-TTNMapper-T-Beam

// Also not that you have to edit lmic.h in your libraries to define CFG_us915 if you are in North America
#include <TinyGPS++.h>
#include <WiFi.h>
#include <SPI.h>
#include <lmic.h>
#include <hal/hal.h>
#include <Wire.h>
#include <CayenneLPP.h> 

#include "gps.h"

const unsigned int TX_INTERVAL = 480;

// These callbacks are only used in over-the-air activation, so they are
// left empty here (we cannot leave them out completely unless
// DISABLE_JOIN is set in config.h, otherwise the linker will complain).
void os_getArtEui (u1_t* buf) { }
void os_getDevEui (u1_t* buf) { }
void os_getDevKey (u1_t* buf) { }

CayenneLPP lpp(51); // here we will construct Cayenne Low Power Payload (LPP) - see https://community.mydevices.com/t/cayenne-lpp-2-0/7510
gps gps; // class that is encapsulating additional GPS functionality

static PROGMEM u1_t NWKSKEY[16] = { 0x99, 0x99, 0x99, 0x99, 0x99, 0x99, 0x18, 0x01, 0x4B, 0x99, 0x99, 0x99, 0x26, 0x99, 0x99, 0x99 }; // LoRaWAN NwkSKey, network session key 
static u1_t PROGMEM APPSKEY[16] = { 0x99, 0x99, 0x99, 0x99, 0x99, 0x99, 0xE5, 0xCF, 0x99, 0x99, 0x99, 0x99, 0x99, 0x99, 0x99, 0x99 }; // LoRaWAN AppSKey, application session key 
static const u4_t DEVADDR = 0x26021B38 ; // LoRaWAN end-device address (DevAddr)

static osjob_t sendjob; // callback to LoRa send packet 
void do_send(osjob_t* j); // declaration of send function

char s[32]; // used to sprintf for Serial output
long nextPacketTime;
const unsigned int GPS_FIX_RETRY_DELAY = 10; // wait this many seconds when no GPS fix is received to retry
double lat, lon, alt, kmph; // GPS data are saved here: Latitude, Longitude, Altitude, Speed in km/h

// Pin mapping
const lmic_pinmap lmic_pins = {
  .nss = 18,
  .rxtx = LMIC_UNUSED_PIN,
  .rst = 23,
  .dio = {26, 33, 32},  // PIN 33 HAS TO BE PHYSICALLY CONNECTED TO PIN Lora1 OF TTGO
};                      // the second connection from Lora2 to pin 32 is not necessary

static const int RXPin = 12, TXPin = 34;  //  changed BG A3 A2

void setup()
{
  Serial.begin(115200);
  Wire.begin(21, 22);

  //Turn off WiFi and Bluetooth
  WiFi.mode(WIFI_OFF);
  btStop();

  gps.init();

  // LMIC init
  os_init();
  // Reset the MAC state. Session and pending data transfers will be discarded.
  LMIC_reset();

  // Set static session parameters. Instead of dynamically establishing a session
  // by joining the network, precomputed session parameters are be provided.
  LMIC_setSession (0x1, DEVADDR, NWKSKEY, APPSKEY);


 #if defined(CFG_us915)
  // NA-US channels 0-71 are configured automatically
  // but only one group of 8 should (a subband) should be active
  // TTN recommends the second sub band, 1 in a zero based count.
  // https://github.com/TheThingsNetwork/gateway-conf/blob/master/US-global_conf.json
  LMIC_selectSubBand(1);
#elif defined(CFG_eu868)
  // Set up the channels used by the Things Network, which corresponds
  // to the defaults of most gateways. Without this, only three base
  // channels from the LoRaWAN specification are used, which certainly
  // works, so it is good for debugging, but can overload those
  // frequencies, so be sure to configure the full frequency range of
  // your network here (unless your network autoconfigures them).
  // Setting up channels should happen after LMIC_setSession, as that
  // configures the minimal channel set.
  // NA-US channels 0-71 are configured automatically
  LMIC_setupChannel(0, 868100000, DR_RANGE_MAP(DR_SF12, DR_SF7),  BAND_CENTI);      // g-band
  LMIC_setupChannel(1, 868300000, DR_RANGE_MAP(DR_SF12, DR_SF7B), BAND_CENTI);      // g-band
  LMIC_setupChannel(2, 868500000, DR_RANGE_MAP(DR_SF12, DR_SF7),  BAND_CENTI);      // g-band
  LMIC_setupChannel(3, 867100000, DR_RANGE_MAP(DR_SF12, DR_SF7),  BAND_CENTI);      // g-band
  LMIC_setupChannel(4, 867300000, DR_RANGE_MAP(DR_SF12, DR_SF7),  BAND_CENTI);      // g-band
  LMIC_setupChannel(5, 867500000, DR_RANGE_MAP(DR_SF12, DR_SF7),  BAND_CENTI);      // g-band
  LMIC_setupChannel(6, 867700000, DR_RANGE_MAP(DR_SF12, DR_SF7),  BAND_CENTI);      // g-band
  LMIC_setupChannel(7, 867900000, DR_RANGE_MAP(DR_SF12, DR_SF7),  BAND_CENTI);      // g-band
  LMIC_setupChannel(8, 868800000, DR_RANGE_MAP(DR_FSK,  DR_FSK),  BAND_MILLI);      // g2-band
  // TTN defines an additional channel at 869.525Mhz using SF9 for class B
  // devices' ping slots. LMIC does not have an easy way to define set this
  // frequency and support for class B is spotty and untested, so this
  // frequency is not configured here.
  #endif

  // Disable link check validation
  LMIC_setLinkCheckMode(0);

  // TTN uses SF9 for its RX2 window.
  LMIC.dn2Dr = DR_SF9;

  // Set data rate and transmit power for uplink (note: txpow seems to be ignored by the library)
  LMIC_setDrTxpow(DR_SF7, 14);

  delay(3000);

  pinMode(BUILTIN_LED, OUTPUT);
  digitalWrite(BUILTIN_LED, LOW);

  Serial.println(F("Ready to track"));

  // Start job
  do_send(&sendjob);
}

void loop()
{
  os_runloop_once();
}

void do_send(osjob_t* j) {  
  // Check if there is not a current TX/RX job running
  if (LMIC.opmode & OP_TXRXPEND) {
    Serial.println(F("OP_TXRXPEND, not sending"));
  }
  else { 
    if (gps.checkGpsFix())
    {
      // Prepare upstream data transmission at the next possible time.
      gps.getLatLon(&lat, &lon, &alt, &kmph);

      Serial.print("Latitude  : ");
      Serial.println(lat);
      Serial.print("Longitude : ");
      Serial.println(lon);

      // we have all the data that we need, let's construct LPP packet for Cayenne
      lpp.reset();
      lpp.addGPS(1, lat, lon, alt);
      
      // read LPP packet bytes, write them to FIFO buffer of the LoRa module, queue packet to send to TTN
      LMIC_setTxData2(1, lpp.getBuffer(), lpp.getSize(), 0);
      
      Serial.print(lpp.getSize());
      Serial.println(F(" bytes long LPP packet queued."));
      digitalWrite(BUILTIN_LED, HIGH);
    }
    else {
      // try again in a few 'GPS_FIX_RETRY_DELAY' seconds...
      os_setTimedCallback(&sendjob, os_getTime() + sec2osticks(GPS_FIX_RETRY_DELAY), do_send);
    }
  }
  // Next TX is scheduled after TX_COMPLETE event.
}

void onEvent (ev_t ev) {
  switch (ev) {
    case EV_SCAN_TIMEOUT:
      Serial.println(F("EV_SCAN_TIMEOUT"));
      break;
    case EV_BEACON_FOUND:
      Serial.println(F("EV_BEACON_FOUND"));
      break;
    case EV_BEACON_MISSED:
      Serial.println(F("EV_BEACON_MISSED"));
      break;
    case EV_BEACON_TRACKED:
      Serial.println(F("EV_BEACON_TRACKED"));
      break;
    case EV_JOINING:
      Serial.println(F("EV_JOINING. If program stops here, set correct LoRaWAN keys in config.h!"));
      break;
    case EV_JOINED:
      Serial.println(F("EV_JOINED"));
      // Disable link check validation (automatically enabled
      // during join, but not supported by TTN at this time).
      LMIC_setLinkCheckMode(0);
      break;
    case EV_RFU1:
      Serial.println(F("EV_RFU1"));
      break;
    case EV_JOIN_FAILED:
      Serial.println(F("EV_JOIN_FAILED"));
      break;
    case EV_REJOIN_FAILED:
      Serial.println(F("EV_REJOIN_FAILED"));
      break;
    case EV_TXCOMPLETE:
      Serial.println(F("EV_TXCOMPLETE (includes waiting for RX windows)"));
      digitalWrite(BUILTIN_LED, LOW);
      if (LMIC.txrxFlags & TXRX_ACK) {
        Serial.println(F("Yup, received ACK!"));
      }
      if (LMIC.dataLen) {
        sprintf(s, "Yeey! Received %i bytes of payload!", LMIC.dataLen);
        Serial.println(s);
        sprintf(s, "RSSI %d SNR %.1d", LMIC.rssi, LMIC.snr);
        Serial.println(s);
      }
      // Schedule next transmission
      nextPacketTime = TX_INTERVAL; // depend on current GPS speed
      os_setTimedCallback(&sendjob, os_getTime() + sec2osticks(nextPacketTime), do_send);
      Serial.print(F("Next LoRa packet scheduled in "));
      Serial.print(nextPacketTime);
      Serial.println(F(" seconds!"));
      Serial.println(F("------------------------------------------------"));
      break;
    case EV_LOST_TSYNC:
      Serial.println(F("EV_LOST_TSYNC"));
      break;
    case EV_RESET:
      Serial.println(F("EV_RESET"));
      break;
    case EV_RXCOMPLETE:
      // data received in ping slot
      Serial.println(F("EV_RXCOMPLETE"));
      break;
    case EV_LINK_DEAD:
      Serial.println(F("EV_LINK_DEAD"));
      break;
    case EV_LINK_ALIVE:
      Serial.println(F("EV_LINK_ALIVE"));
      break;
    default:
      Serial.println(F("Unknown event"));
      break;
  }
}
