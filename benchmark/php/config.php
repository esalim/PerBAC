<?php

// Fichier de configuration pour l'acces à la base de données.

$servername="localhost";
$DBusername="root";
$DBpassword="";
$DBname=""; // Creation de la base de données.

$conn = mysqli_connect($servername,$DBusername,$DBpassword,$DBname);

if (!$conn){  // message d'echec
    die("Connexion echouée".mysqli_connect_error());
}

