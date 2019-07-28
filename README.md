## Smart Parking IoT Platform

### Overview

Smart Parking is the layout of car parks thanks to new technologies. It solves the common problems of the users and allows in particular saving time by guiding instead , strong energy saving thanks to the significant reduction of carbon during the research of the users and ensure an important security, serenity and user-friendliness by the establishment of adequate control of access for the user.
The implementation proposed here integrated also offers many security features thanks to the access control models implemented.

### Hardware Part

In order to implement a platform operating within an IoT environment we have used **_parking sensors_** ie _ultrasonic sensors_ allowing us to detect the presence of a car and **_actuators_** (LEDs) s' activating depending on availability or not. These sensors and actuators are connected thanks to Arduino boards which are _microcontrollers_ having quite good performances in terms of energy consumption, integration etc.
The various collected data are then sent to the Raspberry Pi card which are the _central nodes_ dealing with the management and communication.
data with the cloud. Link for implementation : [**_Hardware Codes_**](https://github.com/AbdramCoulby/PerBAC/tree/master/hardware)

### Benchmark

This section is about the software implementation of our platform. Many features will be found within the _central nodes_ since this is where we will find the technologies used in this project including **_Python ; LAMP servers_** etc ...
Many **_access control models_** are also implemented on the platform to provide flexible and optimal security for our IoT environment.
Present everything with a beautiful interface written in _PHP with HTML and CSS_ for style.
The source codes of the programs are available from the link [**_Benchmark Codes_**](https://github.com/AbdramCoulby/PerBAC/tree/master/benchmark)

### Installation

- After the [**_cabling_**](https://github.com/AbdramCoulby/PerBAC/tree/master/benchmark)  arious components related to Arduino Cards, it is necessary to upload the following [**_arduino code _**](https://github.com/AbdramCoulby/PerBAC/tree/master/hardware/arduino) using the Arduino IDE.

- At the level of the Raspberry Pi cards, it will first be necessary to install several **libraries** and **Python modules** in order to be able to send the data to **_the local server_** and **_ThingSpeak_** visualization platform.

1. Install the following dependencies:

   sudo apt-get update

   sudo apt-get install python python3-pip python3-bs4

   pip install request beautifulsoup4 pyserial

   wget <https://raw.githubusercontent.com/tbird20d/grabserial/master/grabserial> grabserial

2. From then on we will be able to use the command **_python3 grabserial >> filename_** in order to be able to recover the parking space availability value from the Raspberry cards.
   Then we can call on the files [**_serveur.py and client.py_**](https://github.com/AbdramCoulby/PerBAC/tree/master/hardware/raspberry%20pi) which are files using socket connections with **the local server** for saving **data file of available places**

3. Regarding the connection with the ThingSpeak platform the files [**_thingspeakdata.py_**](https://github.com/AbdramCoulby/PerBAC/tree/master/hardware/raspberry%20pi) will be used. It is responsible for directly retrieving the value on the input port of the Raspberry and then transferring these values ​​using **_the API offered by ThingSpeak_** to obtain a visualization.

4. For the implementation of the security and management of existing users the use of a database is essential.To perform this manipulation we have installed [**_XAMPP Server_**](https://www.apachefriends.org/en/index.html) which brings the functionality of **Apache, MySQL, PHPmyadmin** and many others ....

   The database file to import is as follows : [**_smartparking.sql_**](https://www.apachefriends.org/fr/index.html)

More information on this implementation is used in the section dedicated to [**_Benchmark_**](https://github.com/AbdramCoulby/PerBAC/tree/master/benchmark)

### Contributing

Smart Parking Project is not perfect and can be improve and become more better – if you have ideas on how to make the configuration easier to maintain (and faster), don't hesitate to fork and send pull requests !
