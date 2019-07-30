## File Description

We find in this folder the different code programs within the Arduino and Raspberry boards.

### Arduino board:

The source code present in arduino cards allows the ultrasonic sensors to detect by means of audible impulsons the presence of an obstable. This
data is then sent to the Arduinos boards which then use actuators (LEDs) to signal this detection.
This phenomenon is repeated every 30s.

_Link for implementation :_ [**_Arduino Card Code_**](https://github.com/esalim/PerBAC/tree/master/hardware/arduino)

### Raspberry Cards

The source code present in the Raspberry cards allows different Arduino boards after receiving presence data
to send these different data to the Rapberry cards that will process them and send them via
from **_SerialPort_** technology and **_Sockets_** to ThingSpeak with the right rules and actions (which we have previously created) to process the corresponding data.

_Link for implementation :_ [**_Raspberry Pi Card Code_**](https://github.com/esalim/PerBAC/tree/master/hardware/raspberry%20pi)
