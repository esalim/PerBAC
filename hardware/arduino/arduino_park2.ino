// Premier Capteur
#define echoPin1 3       //  Echoc Pin
#define trigPin1 2      // Trigger Pin 
#define led1 4         // LED Pin 

// Deuxième Capteur
/*#define echoPin2 5       //  Echoc Pin
#define trigPin2 6      // Trigger Pin 
#define led2 7         // LED Pin */

// Troisième Capteur
/*#define echoPin3 8       //  Echoc Pin
#define trigPin3 9      // Trigger Pin 
#define led3 10         // LED Pin */

/*#define buzzer 11  // Pin pour l'alarme
#define led4 12 */

// Le temps sera utilisé pour le calcul de la distance
long temps1, distance1; 
// long temps2, distance2;
// long temps3, distance3;   

int comptePlaces=0;
int placesDispo =0;

void setup() {
 Serial.begin (9600);       // On initialise la communication serial avec la Raspberry Pi
 
 // Les Trigger Pins et les LEDs sont declarées comme sorties 
 pinMode(trigPin1, OUTPUT); 
 // pinMode(trigPin2, OUTPUT);
 // pinMode(trigPin3, OUTPUT);
 pinMode(led1, OUTPUT);    
 // pinMode(led2, OUTPUT);
 // pinMode(led3, OUTPUT);
 
 // Les Pins Echocs  sont declarées comme entrées 
 pinMode(echoPin1, INPUT);  
 // pinMode(echoPin2, INPUT);
 // pinMode(echoPin3, INPUT);
 
 // pinMode(buzzer, OUTPUT);    // le pin de l'alarme pin comme sortie
 // pinMode(led4, OUTPUT);    // la pin de la led rouge comme sortie
}

void loop() {
/* Le cycle (trigPin---echoPin) suivant est utilisé pour déterminer la distance de l'objet le plus proche en renvoyant les ondes sonores.*/

/* Un signal de haut niveau d'au moins 10 microsecondes est requis pour déclencher la broche. 
 *  Le module produit alors huit signaux d'impulsion de 40 KHz et attend de recevoir l'écho.
 *                                       _____
 *                                      |     |
 *                          ------------!     !---------
 *                          ............|10us |.........
 */
 
 digitalWrite(trigPin1, LOW); 
 delayMicroseconds(2); 
 digitalWrite(trigPin1, HIGH);
 delayMicroseconds(10); 
 digitalWrite(trigPin1, LOW);
 
// La fonction pulseIn () détermine la durée d'une impulsion et cette la durée est proportionnelle à la distance de l'obstacle
temps1 = pulseIn(echoPin1, HIGH);

 /*digitalWrite(trigPin2, LOW);
 delayMicroseconds(2); 
 digitalWrite(trigPin2, HIGH);
 delayMicroseconds(10); 
 digitalWrite(trigPin2, LOW);
 temps2 = pulseIn(echoPin2, HIGH);*/
 
 /*digitalWrite(trigPin3, LOW);
 delayMicroseconds(2); 
 digitalWrite(trigPin3, HIGH);
 delayMicroseconds(10); 
 digitalWrite(trigPin3, LOW);
 temps3 = pulseIn(echoPin3, HIGH);*/

// Distance = Vitesse du son (340 m/s) / 2, car on effectue un aller-retour.
// En Centimètre on a d(cm) = temps de parcours (us) / 58
 distance1 = temps1/58.2;
 if(distance1<10){
 distance1 = 1;
 digitalWrite(led1,HIGH);  // Allumage de la led
 }
 else {
  distance1 = 0;
  digitalWrite(led1,LOW);
 }
 
 /*distance2 = temps2/58.2;
 if(distance2<10){
 distance2 = 1;
 digitalWrite(led2,HIGH);  // Allumage de la led
 }
 else {
  distance1 = 0;
  digitalWrite(led2,LOW);
 }*/
 
 /*distance3 = temps3/58.2;
 if(distance3<10){
 distance3 = 1;
 digitalWrite(led3,HIGH);  // Allumage de la led
 }
 else {
  distance1 = 0;
  digitalWrite(led3,LOW);
 }*/

 comptePlaces = distance1 ; //+ distance2 + distance3 ;  // Addition des valeurs des capteurs pour determiner le nombre de places.
 
// nombre de places disponibles = nombre total de places  - le nombre total de voitures (les valeurs recues des capteurs).
 placesDispo = 3 - comptePlaces;   

 Serial.println(placesDispo);    // Le nombre total de places disponibles est envoyé à la carte Raspberry Pi grace au Serial USB.

// Activation de la LED rouge et de l'alarme en cas d'insuffisance de places pour le Parking
 /*if(placesDispo==0){
  digitalWrite(led4,HIGH);
  delay(500);
  digitalWrite(led4,LOW);
  delay(500);
  tone(buzzer,100,20);
  Serial.println("Il n'y a plus de places disponible pour ce parking");
 }*/
 
 delay(5000);  // L'etat est mis à jour chaque 30 seconds.
}
