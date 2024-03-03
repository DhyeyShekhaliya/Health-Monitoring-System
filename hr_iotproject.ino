#include<ESP8266WiFi.h>
#include<ESP8266HTTPClient.h>

const char* ssid = "Pixy";
const char* password ="dhyey2121";
const int WifiLED = D0; //ACTUATORS
const int ServerLED=D1; 
const int heartrateled = D2;
const int irSensor = A0;
void setup()
{
Serial.begin(9600);
pinMode(WifiLED, OUTPUT);
pinMode(ServerLED, OUTPUT);
pinMode(irSensor, INPUT);
pinMode(heartrateled, OUTPUT);
digitalWrite(WifiLED, LOW);
digitalWrite(ServerLED, LOW);

WiFi.begin(ssid, password);
while(WiFi.status()!=WL_CONNECTED)
{
digitalWrite(WifiLED, HIGH);
delay(1000);
digitalWrite(WifiLED, LOW);
delay(1000);
}
digitalWrite(WifiLED, HIGH);


}

void loop(){
int irvalue = analogRead(irSensor)/10;
if (irvalue >85){
  digitalWrite(heartrateled, HIGH);
  delay(800);
  digitalWrite(heartrateled, LOW);
  delay(800);
}
Serial.println(irvalue);
HTTPClient http;
http.begin("http://192.168.199.89/script.php?ir="+(String)irvalue);

http.GET();
http.end();



}