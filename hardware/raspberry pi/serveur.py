import socket

host = ""
port = 5005
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

s.bind((host, port))
s.listen(1)
print("Attente d'une connexion...")

(conn, addr) = s.accept()
print("La connexion a été etablie avec succés au serveur")

print("Envoi du fichier de MIT Parking en cours...")
filename = "MIT-ParkingPlace.txt"

#print("Envoi du fichier de MIT Academy Parking en cours...")
#filename = "MIT-Academy-ParkingPlace.txt"

file = open(filename,'rb')
file_data = file.read(1024)
conn.send(file_data)
print("Fichier transferé avec succès vers le serveur local ! ")
