
import sys
import urllib3
import serial
import urllib.request
from time import sleep
import requests
from bs4 import BeautifulSoup
import threading

def Raspi_data():
    port = serial.Serial("/dev/ttyACM0")
    port.flushInput()
    data = port.readline()
    datadec = int(data.decode("utf-8"))
    return (datadec)

def Raspi_dataSend1():
    ParkingPlaces = Raspi_data()
    threading.Timer(15, Raspi_dataSend).start
    # Envoi données ThingSpeak
if isinstance(ParkingPlaces, int):
    url = 'https://api.thingspeak.com/update?api_key='
    key = '57ZNS71HXS2R8FLT'
    header = '&field1={}'.format(ParkingPlaces)
    link = url + key + header
    datasend = urllib.request.urlopen(link)

def Raspi_dataSend2():
    AcademyPlaces = Raspi_data()
    threading.Timer(15, Raspi_dataSend).start
    # Envoi données ThingSpeak
if isinstance(AcademyPlaces, int):
    url = 'https://api.thingspeak.com/update?api_key='
    key = '57ZNS71HXS2R8FLT'
    header = '&field2={}'.format(AcademyPlaces)
    link = url + key + header
    datasend = urllib.request.urlopen(link)

if __name__ == '__main__':
    Raspi_dataSend1()
