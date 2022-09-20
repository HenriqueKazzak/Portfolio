//#include <SparkFun_Ublox_Arduino_Library.h>
//#include <u-blox_config_keys.h>

//https://github.com/sparkfun/SparkFun_Ublox_Arduino_Library
//http://librarymanager/All#SparkFun_Ublox_GPS
#include <SparkFun_Ublox_Arduino_Library.h>
SFE_UBLOX_GPS myGPS;

void setup() {
  Serial.begin(9600);
  Serial.println("Started");
  while (!Serial);  // Wait for user to open the terminal
  Serial.println("Connected to Serial");
  Serial1.begin(9600, SERIAL_8N1, 34, 12);

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
    Serial.println("cant connect, try again");
    delay(1000);
  } while(1);
}

void loop() {
  if (Serial1.available()) {
    Serial.write(Serial1.read());  // print anything comes in from the GPS
  }
}
