<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controle d'acces ABAC</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="abac.css">                                                                 <!-- Appel fichier abac.css pour mise en forme -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>                                              <!-- Importation de la library SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">         <!-- Importation de la library Animate -->
</head>
<body>
<nav>
    <div class="topnav">   <!-- affichage de la barre de navigation -->
        <a class="headlogo"> <img height="50"  width="50" src="../../images/smart_parking.png" alt="logo"> </a>
        <a href="../../php/homepage.php">Description</a>
        <a href="../zend-rbac/description.php">RBAC</a>
        <a class="active" href="description.php">ABAC</a>
        <a href="../PerBAC/description.php">PerBAC</a>
        <a href="../xacml-php/description.php">XACML</a>
        <a href="../resultats.php">Comparative & Results</a>


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
    <a class="active" href="abac.php"><i class="fa fa-fw fa-wrench"></i> Test</a>
</div>

<!-- Page content -->
<div class="content">
    <div class="login-form">
        <form action="abac.php" method="post">
            <h2 class="text-center">Autorisation Membre</h2>
            <!-- Declaration des inputs et buttons de l'interface  -->
            <div class="form-group">
                <input type="text" name="badge" class="form-control" placeholder="Badge Color" required="required">
            </div>
            <div class="form-group">
                <input type="text" name="place" class="form-control" placeholder="Place" required="required">
            </div>
            <div class="form-group">
                <button id="buttonV" name="connect_button" type="submit" class="btn btn-primary btn-block">Check availability
                </button>
            </div>

            <?php

            /************************************* ABAC ********************************************/
            require_once 'vendor/autoload.php';
            require '../config.php';

            use Casbin\Enforcer; // Chargement des biblotheques pour l'utilisation du controle ABAC

            if (isset($_POST['connect_button'])) { // Button cliqué

                $start = microtime(true);
                $e = new Enforcer("mon_model.conf", "ma_regle.csv");  // appel fichier police de decisions (règles)

                $sub = $_POST['badge'];              // Création de l'utilisateur voulant acceder à la ressource
                $obj = $_POST['place'];              // Création de la ressource recherchée
                $act = "acceder";                    // L'operation à effectuer sur cette ressource

                try {
                    if ($e->enforce($sub, $obj, $act) === true) {
                        $check = "dispo";
                        $getEtat = mysqli_fetch_assoc(mysqli_query($conn,"SELECT etat FROM dispo WHERE place = '$obj'"));
                        $Dispo = $getEtat['etat'];   // recuperation etat de la place recherchée dans la Database
                        if ($Dispo===$check){ // place libre
                            $end = microtime(true);
                            $responseTime = 1000*($end - $start);
                            echo "<script type='text/javascript'> 
                    Swal.fire ({
                    title: 'Availability Notification',
                    text: \"The place sought is free and the response time : $responseTime ms\",
                    imageUrl: \"../../images/pass.jpg\",
                    imageWidth: 1500,
                    imageHeight: 200,
                    imageAlt: \"Pass image\",
                    buttons: {confirm: \"Compris\" }
                    }).then(val => {
                    if(val)  {
                    Swal.fire ({
                    type:'success',
                    title: 'Thank you for your trust...!',
                    text: 'Have a nice day',
                    });}});
                    </script>";
                        } else {  // place occupée
                            echo '<script type="text/javascript"> 
                    Swal.fire({
                    title: \'Availability Notification\',
                    text:"The place sought is already occupied",
                    imageUrl: " ../../images/verif.jpg",
                    imageWidth: 1500,
                    imageHeight: 200,
                    imageAlt: "Stop image",
                    animation: false,
                     customClass: { popup: \'animated tada\'}
                    })</script>';
                        }

                    } else {  // problème rencontré
                        echo '<script type="text/javascript"> 
                    Swal.fire({
                    title: "Oops...!",
                    html:"You do not have access rights to this car park ! </br>  Please use the second parking reserved for this purpose.</br>",
                    type:"info",
                    animation: false,
                     customClass: { popup: \'animated rubberBand\'}
                    })</script>';
                    }
                } catch (\Casbin\Exceptions\CasbinException $e) { // message d'erreur
                    echo '<script type="text/javascript"> Swal.fire ( "Oops...!" ,  "Error encountered while processing the operation !" ,  "error" ) </script>';
                }
            }

            ?>
        </form>
    </div>
</div>

</body>
</html>



