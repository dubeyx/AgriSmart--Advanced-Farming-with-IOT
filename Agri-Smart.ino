#define moistureLimit 50
#define motor A2
#define moistureSensor A0
#define Raindrop A1
#define PIR 7
#define DHTPIN 8
int pirState = LOW;             // we start, assuming no motion detected
int val = 0;  


#include "DHT.h"
#define DHTTYPE DHT11   // DHT 11

DHT dht(DHTPIN, DHTTYPE);



bool uploadEnable   = true;
bool downloadEnable = true;
//my web site, replace with yours
#define DST_IP "myfinalyearprojectnsit.000webhostapp.com" 
//Define the pin for the on board 
// globle variable esp8266 wifi
String str;
String u1="";
String u2="";
String u3="";
String u4="";
String u5="";
//________________________________________________________________
 

 void setup()
{  

Serial.begin(115200);
dht.begin();
pinMode(motor, OUTPUT);
pinMode(PIR,INPUT);
digitalWrite(motor, LOW);  
delay(200);
digitalWrite(motor, HIGH);  
 }

void loop()
{
  delay(100);
  action();
 
  Serial.println("AT");
  
  delay (100);  
  delay (100);
  delay (100);
  action();
  Serial.println("AT+CIPMUX=1");
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  action();
  //Open a connection to the web server
  String cmdU = "AT+CIPSTART=0,\"TCP\",\""; //make this command: AT+CPISTART="TCP","192.168.88.35",80
  cmdU += DST_IP;
  cmdU += "\",80\r\n";
  Serial.println(cmdU);
  
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  action(); 
  String  cmdU2  = "GET /update.php?u1=";
      cmdU2  +=u1;
      cmdU2  +="&u2=";
      cmdU2  +=u2;
      cmdU2  +="&u3=";
      cmdU2  +=u3; 
      cmdU2  +="&u4=";
      cmdU2  +=u4; 
      cmdU2  +="&u5=";
      cmdU2  +=u5; 
       
  
 Serial.print("AT+CIPSEND=0,");
Serial.println((cmdU2.length())); 
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  Serial.println("AT+CIPCLOSE");
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  delay(100); 
  action();
  
}



void  action()
{
      float h = dht.readHumidity();
      float t = dht.readTemperature();
      u1=t;
      u2=h;
      val = digitalRead(PIR);  // read input value
  
  if (val == HIGH)	// check if the input is HIGH
  {            
	
    // if (pirState == LOW) 
    //   {
          Serial.println("Motion detected!");	// print on output change
          //pirState = HIGH;
          u5="DETECTED";
      //}
  } 
  else {
  // {
  //   if (pirState == HIGH)
	// {
  //     Serial.println("Motion ended!");	// print on output change
      //pirState = LOW;
      u5="NOT_DETECTED";
  //  }
  }

     int  moisture =100 - analogRead(A0)/10.24;
     int  Rain =100-analogRead(A1)/10.24;
     u3 = moisture;
     u4=Rain;
      if(moisture < moistureLimit )
        {
          digitalWrite(motor,HIGH);
          
        } 
        else{
          digitalWrite(motor,LOW);
        }  


      Serial.print("Temp:");
      Serial.print(u1);
      Serial.print("Humidity:");
      Serial.print(u2);
      Serial.println("%");
      Serial.print("Moisture:");
      Serial.println(u3);
      Serial.print("Rain:");
      Serial.println(u4);
      Serial.print("PIR:");
      Serial.println(u5);

}

 

