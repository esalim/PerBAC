import socket

host = '' # Adresse IP du serveur (La Raspberry)
port = 5005
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect((host, port))
print("Connexion reussie...")

print("Reception du fichier de MIT Parking en cours...")
filename = "PlacesDisponibles--MIT Parking.txt"

#print("Reception du fichier de MIT Academy Parking en cours...")
#filename = "PlacesDisponibles--MIT Academy Parking.txt"

file = open(filename, 'wb')
file_data = s.recv(1024)
file.write(file_data)
file.close()

print("Reception reussie du fichier ! ")
