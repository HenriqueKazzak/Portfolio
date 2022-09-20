#include "axp20x.h"
#include "Arduino.h"
AXP20X_Class pmu;
String read_sentence;
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
  // put your setup code here, to run once:
  AXP192_init();
  AXP192_power(true);
  Serial.println("TTGO GPS TEST");
  delay(2000);
  Serial1.begin(9600, SERIAL_8N1, 34, 12);
}

void loop() {
  read_sentence = Serial1.readStringUntil(13); //13 = return (ASCII)
  read_sentence.trim();

  if (read_sentence.startsWith("$GPGGA")) {
    String gps_lat = sentence_sep(read_sentence, 2); //Latitude in degrees & minutes
    String gps_lon = sentence_sep(read_sentence, 4); //Longitude in degrees & minutes
    String gps_sat = sentence_sep(read_sentence, 7);
    String gps_hgt = sentence_sep(read_sentence, 9);
    String gps_lat_o = sentence_sep(read_sentence, 3);  //Orientation (N or S)
    String gps_lon_o = sentence_sep(read_sentence, 5); //Orientation (E or W)

    Serial.print("LAT: ");
    Serial.print(gps_lat);
    Serial.print(" LON: ");
    Serial.print(gps_lon);
    Serial.print(" HEIGHT: ");
    Serial.print(gps_hgt);
    Serial.print(" SAT: ");
    Serial.println(gps_sat);

    float latitude = convert_gps_coord(gps_lat.toFloat(), gps_lat_o);
    float longitude = convert_gps_coord(gps_lon.toFloat(), gps_lon_o);

    Serial.print(latitude, 6);
    Serial.print(",");
    Serial.println(longitude, 6);
  }
}

String sentence_sep(String input, int index) {
  int finder = 0;
  int strIndex[] = { 0, -1 };
  int maxIndex = input.length() - 1;

  for (int i = 0; i <= maxIndex && finder <= index; i++) {
    if (input.charAt(i) == ',' || i == maxIndex) {  //',' = separator
      finder++;
      strIndex[0] = strIndex[1] + 1;
      strIndex[1] = (i == maxIndex) ? i + 1 : i;
    }
  }
  return finder > index ? input.substring(strIndex[0], strIndex[1]) : "";
}

float convert_gps_coord(float deg_min, String orientation) {
  double gps_min = fmod((double)deg_min, 100.0);
  int gps_deg = deg_min / 100;
  double dec_deg = gps_deg + ( gps_min / 60 );
  if (orientation == "W" || orientation == "S") {
    dec_deg = 0 - dec_deg;
  }
  return dec_deg;
}
