<?php  session_start(); // ouverture d'une session ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IoT Smart Parking</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">                                             <!-- Appel fichier login.css pour mise en forme -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>                                         <!-- Importation de la library SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">    <!-- Importation de la library Animate-->
    <div class="logininbox">
        <img src="../images/Login-Icon.png" class="avatar">
        <h1>Connectez vous ici</h1>
        <form action="index.php" method="post">
            <!-- Declaration des inputs et buttons de l'interface  -->
            <p>Utilisateur</p>
            <input type="text" name="username" placeholder="Entrer le nom d'utilisateur" required>
            <p>Mot de Passe</p>
            <input type="password" name="password" placeholder="Entrer le mot de passe" required>
            <input class="favorite styled"
            <input class="favorite styled"
                   type="submit" id="connect-button" name="submit_button"
                   value="Se Connecter">
            <a href="../php/enregistrement.php"><input class="favorite buttn"
                   type="button" id="enregistr_button"
                   value="S'enregistrer">
        </form>



        <?php

        if (isset($_POST['submit_button'])){   // Fonction isset active lors du clic sur l'element reference par name en html

            require 'config.php';       // Appel fichier config de la base de données

            $username=$_POST['username'];     // Envoie valeurs Method POST
            $password=$_POST['password'];

            $sql = "SELECT * FROM utilisateurs WHERE username = ?";    // requete sql pour la selection
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt,$sql)){   // Message d'erreur script avec SweetAlert
                echo '<script type="text/javascript"> Swal.fire ( "Oops...!" ,  "Erreur de traitement de la requete !" ,  "error" )</script>';
            }

            else {
                mysqli_stmt_bind_param($stmt,"s",$username);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);

                if($row=mysqli_fetch_assoc($result)){                                 // fonction de verification des valeurs saisies
                  $pwdcheck=password_verify($password,$row['password']);

                  if($pwdcheck==false){   // Password Incorrect
                      echo '<script type="text/javascript"> Swal.fire ( "Oops...!" ,  "Mot de passe incorrect !" ,  "error" )</script>';
                  }

                  else if($pwdcheck==true){   // Connexion reussie avec message script !

                  $_SESSION['userId']=$row['id'];
                  $_SESSION['userName']=$row['username'];
                  $_SESSION['userFonct']=$row['fonction'];
                  echo '<script type="text/javascript"> Swal.fire("Bon Travail...!", "Connection reussie!", "success"); 
                     setTimeout(function () {
                          window.location.href="../php/homepage.php";  // the redirect goes here
                      },2500);
                   </script>';

                  }

                  else {
                      echo '<script type="text/javascript"> Swal.fire ( "Oops...!" ,  "Erreur rencontrée !" ,  "error" )</script>';

                  }

                } else {
                  echo '<script type="text/javascript"> Swal.fire ( "Oops...!" ,  "Aucun utilisateur correspondant aux valeurs entrées !" ,"error")</script>';
                }

              }

            }

        ?>
    </div>
</head>
<body>

</body>
</html>


