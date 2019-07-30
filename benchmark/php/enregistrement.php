<?php session_start(); // ouverture d'une session ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="../css/enreg.css">               <!-- Appel fichier enreg.css pour mise en forme -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>              <!-- Importation de la library SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">    <!-- Importation de la library Animate -->
    <div class="registr">
        <img src="../images/Login-Icon.png" class="avatar">
        <h1>Register here</h1>
        <form action="enregistrement.php" method="post">
            <!-- Declaration des inputs et buttons de l'interface  -->
            <p>Utilisateur</p>
            <input type="text" name="username" placeholder="Username" required>
            <p>Fonction</p>
            <input type="text" name="foncuser" placeholder="Fonction" required>
            <p>Mot de Passe</p>
            <input type="password" name="password" placeholder="Password" required>
            <p>Confirmation Mot de Passe</p>
            <input type="password" name="conf_password" placeholder="Confirm Password" required>
            <input class="favorite buttn"
                   type="submit" id="enregistr_button" name="submit_btn"
                   value="Register">
            <a href="../php/index.php"><input class="favorite styled"
                   type="button" id="connect_button"
                   value="Or Sign In ">
        </form>

        <?php
        if (isset($_POST['submit_btn'])){          // Fonction isset active lors du clic sur l'element reference par name en html

            require 'config.php';                // Appel fichier config de la base de données

            $username=$_POST['username'];           // Envoie des valeurs par la Method POST
            $fnct=$_POST['foncuser'];
            $password=$_POST['password'];
            $confpassword=$_POST['conf_password'];

            if ($password!==$confpassword){   // Message d'erreur script avec SweetAlert
                echo '<script type="text/javascript">Swal.fire ("Oops...!","Passwords do not match !", "error")</script>';
            }

            else {
                $sql = "SELECT username FROM utilisateurs WHERE username=?";    // requete sql pour la selection
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql)){   // message erreur
                    echo '<script type="text/javascript"> Swal.fire ("Oops...!", "Request processing error!","error")</script>';
                    set_time_limit(2000);
                }  else {
                    mysqli_stmt_bind_param($stmt,"s",$username);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $result=mysqli_stmt_num_rows($stmt);   // retour d'une valeur apres verification dans la base de données
                    if ($result>0){
                        echo '<script type="text/javascript"> Swal.fire ( "Oops...!" ,"Existing user in the database... Try with another name !", "error" )</script>';
                    }
                    else{
                        $sql = "INSERT INTO utilisateurs (username,fonction,password) VALUES (?,?,?)";  // insertion des valeurs entrées
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt,$sql)){
                            echo '<script type="text/javascript"> Swal.fire ( "Oops...!" ,  "Request processing error !" ,  "error" )</script>';
                        } else {
                            $hashpwd = password_hash($password,PASSWORD_DEFAULT);   // Hashage mot de passe
                            mysqli_stmt_bind_param($stmt,"sss",$username,$fnct,$hashpwd);
                            mysqli_stmt_execute($stmt);
                            $_SESSION['userName']=$username;       // lancement session avec references de connexion
                            $_SESSION['userFonct']=$fnct;
                            echo '<script type="text/javascript"> Swal.fire("Good Work...!","User registered successfully !", "success");
                      setTimeout(function () {             // Fonction d\'attente 
                          window.location.href="../php/homepage.php";     // the redirect goes here
                          },3000);  </script>';
                        }
                     }
                }

            }

        }

        ?>
    </div>
</head>
<body>

</body>
</html>

