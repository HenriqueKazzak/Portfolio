#include "axp20x.h"
#include "Arduino.h"
#include <TinyGPS++.h>
#include <axp20x.h>

TinyGPSPlus gps;
HardwareSerial GPS(1);
AXP20X_Class axp;

AXP20X_Class pmu;
void AXP192_power(bool on) {
  if (on) {
    Serial.println("Start GPS, Lora, OLED and blink Led if start");
    pmu.setPowerOutPut(AXP192_LDO2, AXP202_ON);  // Lora on T-Beam V1.0
    pmu.setPowerOutPut(AXP192_LDO3, AXP202_ON);  // Gps on T-Beam V1.0
    pmu.setPowerOutPut(AXP192_DCDC1, AXP202_ON); // OLED on T-Beam v1.0
    pmu.setChgLEDMode(AXP20X_LED_LOW_LEVEL);
    pmu.setChgLEDMode(AXP20X_LED_BLINK_1HZ);
  } else {
    pmu.setChgLEDMode(AXP20X_LED_OFF);
    pmu.setPowerOutPut(AXP192_DCDC1, AXP202_OFF);
    pmu.setPowerOutPut(AXP192_LDO3, AXP202_OFF);
    pmu.setPowerOutPut(AXP192_LDO2, AXP202_OFF);
  }
}
void AXP192_init() {      
    Wire.begin(21, 22);
    if (pmu.begin(Wire, AXP192_SLAVE_ADDRESS)) {
      Serial.println("AXP192 PMU initialization failed");
    }
    else {
      Serial.println("Initialzation...");
      // configure AXP192
      pmu.setDCDC1Voltage(3500);              // for external OLED display
      pmu.setTimeOutShutdown(false);          // no automatic shutdown
      pmu.setTSmode(AXP_TS_PIN_MODE_DISABLE); // TS pin mode off to save power

      // switch ADCs on
      pmu.adc1Enable(AXP202_BATT_VOL_ADC1, true);
      pmu.adc1Enable(AXP202_BATT_CUR_ADC1, true);
      pmu.adc1Enable(AXP202_VBUS_VOL_ADC1, true);
      pmu.adc1Enable(AXP202_VBUS_CUR_ADC1, true);

      // switch power rails on
      AXP192_power(true);

      Serial.println("AXP192 PMU initialized");
    }
}
void setup() {
  Serial.begin(115200);
  Wire.begin(21, 22);
    if (!axp.begin(Wire, AXP192_SLAVE_ADDRESS)) {
    Serial.println("AXP192 Begin PASS");
  } else {
    Serial.println("AXP192 Begin FAIL");
  }
  // put your setup code here, to run once:
  AXP192_init();
  AXP192_power(true); 
  GPS.begin(38400, SERIAL_8N1, 34, 12);

}


void loop()
{
  Serial.print("Latitude  : ");
  Serial.println(gps.location.lat(), 5);
  Serial.print("Longitude : ");
  Serial.println(gps.location.lng(), 4);
  Serial.print("Satellites: ");
  Serial.println(gps.satellites.value());
  Serial.print("Altitude  : ");
  Serial.print(gps.altitude.feet() / 3.2808);
  Serial.println("M");
  Serial.print("Time      : ");
  Serial.print(gps.time.hour());
  Serial.print(":");
  Serial.print(gps.time.minute());
  Serial.print(":");
  Serial.println(gps.time.second());
  Serial.print("Speed     : ");
  Serial.println(gps.speed.kmph()); 
  Serial.print("Google Maps link: ");
  Serial.print("http://maps.google.com/maps?q=");
  Serial.print(gps.location.lat(), 5);
  Serial.print(",");
  Serial.println(gps.location.lng(), 4);
  Serial.println("**********************");

  smartDelay(1000);

  if (millis() > 5000 && gps.charsProcessed() < 10)
    Serial.println(F("No GPS data received: check wiring"));
}

static void smartDelay(unsigned long ms)
{
  unsigned long start = millis();
  do
  {
    while (GPS.available())
      gps.encode(GPS.read());
  } while (millis() - start < ms);
}
