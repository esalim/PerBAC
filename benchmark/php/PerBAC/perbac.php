<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controle d'acces PerBAC</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="perbac.css">
    <!-- Appel fichier perbac.css pour mise en forme -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- Importation de la library SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <!-- Importation de la library Animate -->
</head>
<body>
<nav>
    <div class="topnav">   <!-- affichage de la barre de navigation -->
        <a class="headlogo"> <img height="50" width="50" src="../../images/smart_parking.png" alt="logo"> </a>
        <a href="../../php/homepage.php">Description</a>
        <a href="../zend-rbac/description.php">RBAC</a>
        <a href="../php-abac/description.php">ABAC</a>
        <a class="active" href="description.php">PerBAC</a>
        <a href="../xacml-php/description.php">XACML</a>
        <a href="../resultats.php">Comparatifs & Resultats</a>


        <div class="dropdown">
            <button class="dropbtn">Sign In/Sign Up
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="../../php/index.php">Sign In</a>
                <a href="../../php/enregistrement.php">Sign Up</a>
            </div>
        </div>
        <a href="../../php/index.php" id="logout">Sortir</a>
    </div>
</nav>
<!-- The sidebar -->
<div class="sidebar">
    <a href="description.php"><i class="fa fa-fw fa-newspaper-o"></i> Description</a>
    <a class="active" href="perbac.php"><i class="fa fa-fw fa-wrench"></i> Test</a>
</div>

<!-- Page content -->
<div class="content">
    <div class="login-form">
        <form action="perbac.php" method="post">
            <h2 class="text-center">Autorisation Membre</h2>
            <!-- Declaration des inputs et buttons de l'interface  -->
            <div class="form-group">
                <input type="text" name="organisation" class="form-control" placeholder="Nom de l'Organisation"
                       required="required">
            </div>
            <div class="form-group">
                <input type="text" name="nom" class="form-control" placeholder="Nom de l'utilisateur"
                       required="required">
            </div>
            <div class="form-group">
                <input type="text" name="poste" class="form-control" placeholder="Poste" required="required">
            </div>
            <div class="form-group">
                <input type="text" name="badge" class="form-control" placeholder="Couleur de votre badge"
                       required="required">
            </div>
            <div class="form-group">
                <input type="text" name="place" class="form-control" placeholder="Place Recherchée" required="required">
            </div>
            <div class="form-group">
                <input type="text" name="auto" class="form-control" placeholder="Avez vous les droits requis"
                       required="required">
            </div>
            <div class="form-group">
                <button id="buttonV" name="connect_button" type="submit" class="btn btn-primary btn-block">Verifier
                    disponibilité
                </button>
            </div>
            <br>
            <br>


            <h3 align="center"><strong><em>Video Test à l'aide du Langage JAVA et des fichiers JSONs </em></strong></h3>
            <div class="form-group" align="center">
                <video width="800" height="450" controls >
                    <source  src="perbac-java/perbac.mp4" type="video/mp4" >
                </video>
            </div>

            <?php

            /************************************* PerBAC ********************************************/

            require '../config.php';

            if (isset($_POST['connect_button'])) {   // Button cliqué


                // Envoi des données par la methode POST.On utilisera le type de variable global
                // par la suite afin de recuperer ces valeurs pour l'utilisation de nos fonctions.
                //Elle remplace l'entite POlicy Information Point qui etait déstinée
                //  à l'extraction des attributs (non nécessaire dans ce cas)

                $Organisation = $_POST['organisation'];
                $NomUser = $_POST['nom'];
                $Poste = $_POST['poste'];
                $Badge = $_POST['badge'];
                $PlaceRech = $_POST['place'];
                $Autorisation = $_POST['auto'];
                $Action = "acceder";

                /******************** Fonction du PIP & PAP *********************************/
                /* Ces deux fonctions permettent de verifier la permission d'acces des ressources d'un utilisateur
                aux ressources.Elles representent le Policy Administration Point qui est l'organe de gestion
                 des poliques (Création et Modification des politiques numériques, ou des règles de securités) */

                function accessControle(): bool
                {
                    // cette fonction effectue une comparaison entre les attributs stockes dans la table permission de la base de données
                    // et les attributs entrés du sujet (Method POST située au dessus ) qui remplace le PIP. la Fonction retourne
                    // un boolean suivant le comportement de l'utilisateur. ( Fonction utilisée pour un utilisateur ayant un BAGDE BLEU )


                    // Connexion base de données
                    $servername = "localhost";
                    $DBusername = "root";
                    $DBpassword = "";
                    $DBname = "smartparking";

                    $bdd = mysqli_connect($servername, $DBusername, $DBpassword, $DBname);

                    if (!$bdd) {  // message d'echec
                        die("Connexion echouée" . mysqli_connect_error());
                    }

                    global $Organisation, $NomUser, $Poste, $Autorisation,$Action;

                    // Recuperation des valeurs auprès de la base de doonées
                    $getBorgani = mysqli_fetch_assoc(mysqli_query($bdd, "SELECT nomOrga FROM permission WHERE nomOrga = '$Organisation'and nomUser='$NomUser'"));
                    $NameOrg = $getBorgani['nomOrga'];
                    $getBsujet = mysqli_fetch_assoc(mysqli_query($bdd, "SELECT nomUser FROM permission WHERE nomUser = '$NomUser' and nomOrga = '$Organisation'"));
                    $NameUser = $getBsujet['nomUser'];
                    $getBposte = mysqli_fetch_assoc(mysqli_query($bdd, "SELECT poste FROM permission WHERE poste = '$Poste'"));
                    $PosteUser = $getBposte['poste'];
                    $getBaction = mysqli_fetch_assoc(mysqli_query($bdd, "SELECT action FROM permission WHERE action = '$Action'"));
                    $ActionUser = $getBaction['action'];



                    if ($Organisation === $NameOrg) {   // Politique de sécurité et d'accès
                        if ($NomUser === $NameUser && $Poste === $PosteUser && $Action === $ActionUser && $Poste !== "Administrateur") {
                            if ($Autorisation === "oui") {
                                return true;
                            } else {
                                return false;
                            }
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                }

                function accessControlStandard(): bool
                {

                    // cette fonction effectue une comparaison entre les attributs stockes dans la table permission de la base de données
                    // et les attributs entrés du sujet (Method POST située au dessus ) qui remplace le PIP. la Fonction retourne
                    // un boolean suivant le comportement de l'utilisateur. ( Fonction utilisée pour un utilisateur ayant un  BAGDE ROUGE )

                    // Connexion base de données
                    $servername = "localhost";
                    $DBusername = "root";
                    $DBpassword = "";
                    $DBname = "smartparking";

                    $bdd = mysqli_connect($servername, $DBusername, $DBpassword, $DBname);

                    if (!$bdd) {  // message d'echec
                        die("Connexion echouée" . mysqli_connect_error());
                    }


                    global $Organisation, $NomUser, $Poste, $Autorisation;

                    // Recuperation des valeurs auprès de la base de doonées
                    $getBorgani = mysqli_fetch_assoc(mysqli_query($bdd, "SELECT nomOrga FROM permission WHERE nomOrga = '$Organisation' and nomUser='$NomUser'"));
                    $NameOrg = $getBorgani['nomOrga'];
                    $getBsujet = mysqli_fetch_assoc(mysqli_query($bdd, "SELECT nomUser FROM permission WHERE nomUser = '$NomUser'and nomOrga = '$Organisation'"));
                    $NameUser = $getBsujet['nomUser'];


                    if ($Organisation === $NameOrg) {  // Politique de sécurité et d'accès
                        if ($NomUser === $NameUser && $Poste !== "Developpeur" && $Poste !== "Secretaire") {
                            if ($Autorisation === "oui") {
                                return true;
                            } else {
                                return false;
                            }
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
                }

                /****************************Fonction du PDP ****************************/

                /* Cette fonction determine s'il convient d'autoriser ou non la demande d'un utilisateur
                en fonction des informations recuperes et des règles de securites.Il s'agit là ici du Policy Decision Point */

                function valider()
                {

                    $servername = "localhost";
                    $DBusername = "root";
                    $DBpassword = "";
                    $DBname = "smartparking";

                    $conn = mysqli_connect($servername, $DBusername, $DBpassword, $DBname);

                    if (!$conn) {  // message d'echec
                        die("Connexion echouée" . mysqli_connect_error());
                    }

                    global $Badge, $PlaceRech;

                    if ($Badge === "Rouge") {
                        accessControlStandard();
                        if (accessControlStandard() === true) {
                            if ($PlaceRech === "place 1" || $PlaceRech === "place 2" || $PlaceRech === "place 3" || $PlaceRech === "place 4" || $PlaceRech === "place 5") {
                                $check = "dispo";
                                $getEtat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT etat FROM dispo WHERE place = '$PlaceRech'"));
                                $Dispo = $getEtat['etat'];
                                if ($Dispo === $check) { // place libre
                                    echo '<script type="text/javascript">
                    Swal.fire ({
                    title:"Notification de disponibilité",
                    text: "La place recherchée est libre ! ",
                    imageUrl: " ../../images/pass.jpg",
                    imageWidth: 1500,
                    imageHeight: 200,
                    imageAlt: "Pass image",
                    buttons: {confirm: "Compris" }
                    }).then(val => {
                    if(val)  {
                    Swal.fire ({
                    type:"success",
                    title: "Merci pour votre confiance...!",
                    text: "Excellente journée",
                    });}});
                    </script>';
                                } else {  // place occupée
                                    echo '<script type="text/javascript">
                    Swal.fire({
                    title: \'Notification de disponibilité\',
                    text:"La place recherchée est déjà occupée",
                    imageUrl: " ../../images/verif.jpg",
                    imageWidth: 1500,
                    imageHeight: 200,
                    imageAlt: "Stop image",
                    animation: false,
                     customClass: { popup: \'animated tada\'}
                    })</script>';
                                }
                            } else {
                                echo '<script type="text/javascript">
                    Swal.fire({
                    title: \'Oops\',
                    text:"Vous ne disposez pas des droits d\'accès à cette place",
                    type:"info"
                    })</script>';
                            }
                        } else {  // message erreur
                            echo '<script type="text/javascript">
                    Swal.fire({
                    title: \'Oops\',
                    text:"Vous ne disposez pas des droits requis pour effectuer cette opération",
                    type:"error"
                    })</script>';
                        }
                    } else if ($Badge === "Bleu") {
                        accessControle();
                        if (accessControle() === true) {
                            if ($PlaceRech !== "place 1" || $PlaceRech != "place 2" || $PlaceRech != "place 3" || $PlaceRech != "place 4" || $PlaceRech != "place 5") {
                                $check = "dispo";
                                $getEtat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT etat FROM dispo WHERE place = '$PlaceRech'"));
                                $Dispo = $getEtat['etat'];
                                if ($Dispo === $check) { // place libre
                                    echo '<script type="text/javascript">
                    Swal.fire ({
                    title:"Notification de disponibilité",
                    text: "La place recherchée est libre ! ",
                    imageUrl: " ../../images/pass.jpg",
                    imageWidth: 1500,
                    imageHeight: 200,
                    imageAlt: "Pass image",
                    buttons: {confirm: "Compris" }
                    }).then(val => {
                    if(val)  {
                    Swal.fire ({
                    type:"success",
                    title: "Merci pour votre confiance...!",
                    text: "Excellente journée",
                    });}});
                    </script>';
                                } else {  // place occupée
                                    echo '<script type="text/javascript">
                    Swal.fire({
                    title: \'Notification de disponibilité\',
                    text:"La place recherchée est déjà occupée",
                    imageUrl: " ../../images/verif.jpg",
                    imageWidth: 1500,
                    imageHeight: 200,
                    imageAlt: "Stop image",
                    animation: false,
                     customClass: { popup: \'animated tada\'}
                    })</script>';
                                }
                            } else {
                                echo '<script type="text/javascript">
                    Swal.fire({
                    title: \'Oops\',
                    text:"Vous ne disposez pas des droits d\'accès à cette place",
                    type:"info"
                    })</script>';
                            }
                        } else {  // message erreur
                            echo '<script type="text/javascript">
                    Swal.fire({
                    title: \'Oops\',
                    text:"Vous ne disposez pas des droits requis pour effectuer cette opération",
                    type:"error"
                    })</script>';
                        }
                    } else {
                        echo '<script type="text/javascript">
                    Swal.fire({
                    title: \'Oops\',
                    text:"Vous ne disposez pas des droits requis pour effectuer cette opération",
                    type:"error"
                    })</script>';
                    }
                }

                /*************************** Test *******************************************/

                valider();

            }

            ?>
        </form>

    </div>
</div>

</body>
</html>

