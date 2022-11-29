#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <DHT.h>
#include <Adafruit_BMP085.h>
#include <Wire.h>


const char *ssid = "<ssid>";
const char *password = "<password>";
const IPAddress server(<ip de servidor);
const int httpPort = <puerto de conexion>;

#define Photoresistor A0
#define I2C_SCL 12
#define I2C_SDA 13

float temp, hume;
String PostData, node = "2";
bool bmp085_present=true;

DHT dht(2, DHT11);
Adafruit_BMP085 bmp;
WiFiClient client;
HTTPClient http;

void setup() {
  Serial.begin(9600);

  pinMode(5, OUTPUT);
  pinMode(4, OUTPUT);
  pinMode(0, OUTPUT);

  digitalWrite(5, HIGH);
  delay(2000);

  connectToWiFi();

  connectToServer();
  
  dht.begin();
  Wire.begin(I2C_SDA, I2C_SCL);
  bmp.begin();
}

void loop() {
  if (WiFi.status() != WL_CONNECTED) {
    digitalWrite(4, LOW); 
    connectToWiFi();
  }
  
  http.begin(client, "http://<host>/Clima-Tec/php/data_post1.php");

  hume = dht.readHumidity();
  temp = dht.readTemperature();
  int a_value = analogRead(Photoresistor);
  int brillo = map(a_value, 0, 1000, 0, 100);

  float bp =  bmp.readPressure()/100;
  float ba =  bmp.readAltitude();

  Serial.println("node = " + node + " temperature = " + temp + " humidity = " + hume + " shadow = " + brillo + " Pressure = " + bp + " altitude = " + ba);
  PostData = "node=" + node + "&temperature=" + temp + "&humidity=" + hume + "&shadow=" + brillo + "&pressure=" + bp + "&altitude=" + ba;
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  int httpCode = http.POST(PostData);
  Serial.println(httpCode);
  http.end();

  delay(300000);
}

void connectToWiFi() {
  //Connect to WiFi Network
  Serial.println();
  Serial.print("Connecting to WiFi");
  Serial.println("...");
  WiFi.begin(ssid, password);
  int retries = 0;
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

void connectToServer() {
  if (client.connect(server, httpPort)) {
    Serial.println("Client Connected");
    digitalWrite(0, HIGH);
  }else {
    Serial.println("No Connection");
    digitalWrite(0, LOW);
  }
}