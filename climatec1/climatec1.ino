//libraries and dependencies
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <DHT.h>
#include <Adafruit_BMP085.h>
#include <Wire.h>

//wifi and server credentials
const char *ssid = "<ssid>"; //wifi ssid replaced by <ssid> with your wifi ssid
const char *password = "<password>"; //wifi password replaced by <password> with your wifi password
const IPAddress server(<ip de servidor>); //server ip replaced by <ip de servidor> with your server ip
const int httpPort = <puerto de conexion>; //server port replaced by <puerto de conexion> with your server port

//variables and constants
#define Photoresistor A0
#define I2C_SCL 12
#define I2C_SDA 13

float temp, hume;
String PostData, node = "2";
bool bmp085_present=true;

//definition of sensors and initialization of http and wifi
DHT dht(2, DHT11);
Adafruit_BMP085 bmp;
WiFiClient client;
HTTPClient http;

//setup function
void setup() {
  //begin serial port
  Serial.begin(9600);

  //define state of initial leds
  pinMode(5, OUTPUT); //init led
  pinMode(4, OUTPUT); //wifi led
  pinMode(0, OUTPUT); //server led

  digitalWrite(5, HIGH);
  delay(2000);

  //begin wifi connection
  connectToWiFi();
  //begin server connection
  connectToServer();
  //begin sensors
  dht.begin();
  Wire.begin(I2C_SDA, I2C_SCL);
  bmp.begin();
}

//loop function
void loop() {
  //check wifi connection
  if (WiFi.status() != WL_CONNECTED) {
    digitalWrite(4, LOW); 
    connectToWiFi();
  }
  
  //check server connection
  http.begin(client, "http://<host>/Clima-Tec/php/data_post1.php"); //server url replaced by <host> with your server url

  //read sensors
  hume = dht.readHumidity(); //read humidity
  temp = dht.readTemperature(); //read temperature
  int a_value = analogRead(Photoresistor);  //read photoresistor
  int brillo = map(a_value, 0, 1000, 0, 100); //map photoresistor value

  float bp =  bmp.readPressure()/100; //read pressure
  float ba =  bmp.readAltitude(); //read altitude

  //print data and generate string for http query
  Serial.println("node = " + node + " temperature = " + temp + " humidity = " + hume + " shadow = " + brillo + " Pressure = " + bp + " altitude = " + ba);
  PostData = "node=" + node + "&temperature=" + temp + "&humidity=" + hume + "&shadow=" + brillo + "&pressure=" + bp + "&altitude=" + ba;

  //semd http query
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  int httpCode = http.POST(PostData);
  Serial.println(httpCode);
  http.end();

  //delay every 5 minutes
  delay(300000);
}

//function to connect to wifi
void connectToWiFi() {
  //Connect to WiFi Network
  Serial.println();
  Serial.print("Connecting to WiFi");
  Serial.println("...");
  WiFi.begin(ssid, password);
  int retries = 0;
  //wait for connection
  while ((WiFi.status() != WL_CONNECTED) && (retries < 15)) {
    digitalWrite(4, HIGH);
    delay(500);
    digitalWrite(4, LOW);
    retries++;
    delay(500);
    Serial.print(".");
  }
  if (retries > 14) {
    Serial.println(F("WiFi connection FAI4"));
  }
  if (WiFi.status() == WL_CONNECTED) {
    Serial.println(F("WiFi connected!"));
    Serial.print("IP address: ");
    Serial.println(WiFi.localIP());
    digitalWrite(4, HIGH);
  }
  Serial.println(F("Setup ready"));
}

//function to connect to server
void connectToServer() {
  if (client.connect(server, httpPort)) {
    Serial.println("Client Connected");
    digitalWrite(0, HIGH);
  }else {
    Serial.println("No Connection");
    digitalWrite(0, LOW);
  }
}