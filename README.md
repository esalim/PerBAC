##  Smart Parking IoT Platform
Smart Parking  is the layout of car parks thanks to new technologies. It solves the common problems of the users and allows in particular saving time by guiding instead , strong energy saving thanks to the significant reduction of carbon during the research of the users and ensure an important security, serenity and user-friendliness by the establishment of adequate control of access for the user. 
The implementation proposed here integrated also offers many security features thanks to the access control models implemented.

### Hardware Part 
In order to implement a platform operating within an IoT environment we have used ***parking sensors***  ie  *ultrasonic sensors* allowing us to detect the presence of a car and ***actuators*** (LEDs) s' activating depending on availability or not. These sensors and actuators are connected thanks to Arduino boards which are *microcontrollers* having quite good performances in terms of energy consumption, integration etc.
The various collected data are then sent to the Raspberry Pi card which are the *central nodes* dealing with the management and communication.
data with the cloud. Link for implementation  : [***Hardware Codes***](https://github.com/AbdramCoulby/PerBAC/tree/master/hardware) 

### Benchmark
This section is about the software implementation of our platform. Many features will be found within the *central nodes* since this is where we will find the technologies used in this project including ***Javascript, Node JS, LAMP servers*** etc ...
Many ***access control models*** are also implemented on the platform to provide flexible and optimal security for our IoT environment.
Present everything with a beautiful interface written in *PHP with HTML and CSS* for style.
The source codes of the programs are available from the link  [***Benchmark Codes***](https://github.com/AbdramCoulby/PerBAC/tree/master/benchmark) 
