//https://github.com/sparkfun/SparkFun_Ublox_Arduino_Library
//http://librarymanager/All#SparkFun_Ublox_GPS
#include <SparkFun_Ublox_Arduino_Library.h>
SFE_UBLOX_GPS myGPS;

// Select your board version
//#define T_BEAM_V07  // AKA Rev0 (first board released)
#define T_BEAM_V10  // AKA Rev1 (second board released)

#if defined(T_BEAM_V07)
#define GPS_RX_PIN      12
#define GPS_TX_PIN      15
#elif defined(T_BEAM_V10)
#include <Wire.h>
#include "axp20x.h"
AXP20X_Class axp;
#define I2C_SDA         21
#define I2C_SCL         22
#define GPS_RX_PIN      34
#define GPS_TX_PIN      12
#endif

void setup() {
  Serial.begin(115200);
  while (!Serial);  // Wait for user to open the terminal
  Serial.println("Connected to Serial");

#if defined(T_BEAM_V10)
  Wire.begin(I2C_SDA, I2C_SCL);
  if (!axp.begin(Wire, AXP192_SLAVE_ADDRESS)) {
      Serial.println("AXP192 Begin PASS");
  } else {
      Serial.println("AXP192 Begin FAIL");
  }
  axp.setPowerOutPut(AXP192_LDO3, AXP202_ON); // GPS main power
#endif
  
  Serial1.begin(9600, SERIAL_8N1, GPS_RX_PIN, GPS_TX_PIN);

  do {
    if (myGPS.begin(Serial1)) {
      Serial.println("Connected to GPS");
      myGPS.setUART1Output(COM_TYPE_NMEA); //Set the UART port to output NMEA only
      myGPS.saveConfiguration(); //Save the current settings to flash and BBR
      Serial.println("GPS serial connected, output set to NMEA");
      myGPS.disableNMEAMessage(UBX_NMEA_GLL, COM_PORT_UART1);
      myGPS.disableNMEAMessage(UBX_NMEA_GSA, COM_PORT_UART1);
      myGPS.disableNMEAMessage(UBX_NMEA_GSV, COM_PORT_UART1);
      myGPS.disableNMEAMessage(UBX_NMEA_VTG, COM_PORT_UART1);
      myGPS.disableNMEAMessage(UBX_NMEA_RMC, COM_PORT_UART1);
      myGPS.enableNMEAMessage(UBX_NMEA_GGA, COM_PORT_UART1);
      Serial.println("Enabled/disabled NMEA sentences");
      break;
    }
    delay(1000);
  } while(1);
}

void loop() {
  if (Serial1.available()) {
    Serial.write(Serial1.read());  // print anything comes in from the GPS
  }
}
