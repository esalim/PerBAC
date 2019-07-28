<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controle d'acces RBAC</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="rbac.css">                                                                 <!-- Appel fichier rbac.css pour mise en forme -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>                                              <!-- Importation de la library SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">         <!-- Importation de la library Animate -->
</head>
<body>
<nav>

    <div class="topnav">   <!-- affichage de la barre de navigation -->
        <a class="headlogo"> <img height="50"  width="50" src="../../images/smart_parking.png" alt="logo"> </a>
        <a href="../../php/homepage.php">Description</a>
        <a class="active" href="../zend-rbac/description.php">RBAC</a>
        <a href="../php-abac/description.php">ABAC</a>
        <a href="../PerBAC/description.php">PerBAC</a>
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
    <a  href="description.php" ><i class="fa fa-fw fa-newspaper-o"></i> Description</a>
    <a class="active" href="rbac.php"><i class="fa fa-fw fa-wrench"></i> Test</a>
</div>

<!-- Page content -->
<div class="content">
    <form action="rbac.php" method="post">
        <h2 class="text-center">Autorisation Membre</h2>
        <!-- Declaration des inputs et buttons de l'interface  -->
        <div class="form-group">
            <input type="text" name="urole" class="form-control" placeholder="Role" required="required">
        </div>
        <div class="form-group">
            <input type="text" name="uzone" class="form-control" placeholder="Zone" required="required">
        </div>
        <div class="form-group">
            <input type="text" name="place" class="form-control" placeholder="Place" required="required">
        </div>
        <div class="form-group">
            <button name="connect_button" type="submit" class="btn btn-primary btn-block">Verifier disponibilité
            </button>
        </div>
        <?php

        /************************************* RBAC ********************************************/
        require "vendor/autoload.php";

        use Zend\Permissions\Rbac\Rbac;
        use Zend\Permissions\Rbac\Role;

        $administrateur = new Role('administrateur');  // Création des roles
        $administrateur->addPermission('Zone A');      // Affectation des permissions
        $administrateur->addPermission('Zone B');
        //$administrateur->addPermission('Zone C');

        $developpeur = new Role('developpeur');  // Création des roles
        $developpeur->addPermission('Zone B');   // Affectation des permissions
        $developpeur->addPermission('Zone C');

        $secretaire = new Role('secretaire');
        $secretaire->addPermission('Zone C');

        $rbacAdmin = new Rbac();                    // Appel library zend pour utilisateur du controle RBAC
        $rbacAdmin->addRole($administrateur);       // Affection identifiant abac crée au role précedemment crée

        $rbacDev = new Rbac();
        $rbacDev->addRole($developpeur);

        $rbacSrt = new Rbac();
        $rbacSrt->addRole($secretaire);

        if (isset($_POST['connect_button'])) {

            require '../../php/config.php';  // Chargement fichier config database


            $var1 = $_POST['urole'];  // Envoi données par la Method POST
            $var2 = $_POST['uzone'];
            $place = $_POST['place'];

            //$array = [];

            if (!$rbacAdmin->isGranted("$var1", "$var2")) { // Accès permission refuséee
                //
                echo '<script type="text/javascript"> 
                    Swal.fire({
                    title: "Oops...!",
                    html:"Vous n\'avez pas les droits d\'accès à ce parking ! </br>  Veuillez utiliser le second parking reservé à ce effet. </br>  (Voir Section Dashboard) ",
                    type:"info",
                    animation: false,
                     customClass: { popup: \'animated rubberBand\'}
                    })</script>';

            } else { // Accès accordée

                $req = "SELECT * FROM dispo WHERE place = '$place'";
                $req_run = mysqli_query($conn,$req);

                if(mysqli_num_rows($req_run)>0){
                    $check = "dispo";
                    $getEtat = mysqli_fetch_assoc(mysqli_query($conn,"SELECT etat FROM dispo WHERE place = '$place'"));
                    $Dispo = $getEtat['etat'];   // recuperation etat de la place recherchée dans la Database
                    if($Dispo==$check){ // place libre
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

                    } else { // place occupée
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
                } else { // message d'erreur
                    echo '<script type="text/javascript"> Swal.fire ( "Oops...!" ,  "La place recherchée n\'existe pas" ,  "error" ) </script>';
                }

            }

        }

        ?>
    </form>
</div>
</body>
</html>


