<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/homepage.css"><!-- Appel fichier abac.css pour mise en forme -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script><!-- Importation de la library SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <!-- Importation de la library Animate -->
</head>
<body>
<nav>
    <div class="topnav">   <!-- affichage de la barre de navigation -->
        <a class="headlogo"> <img height="50" width="50" src="../images/smart_parking.png" alt="logo"> </a>
        <a class="active" href="homepage.php">Description</a>
        <a href="zend-rbac/description.php">RBAC</a>
        <a href="php-abac/description.php">ABAC</a>
        <a href="PerBAC/description.php">PerBAC</a>
        <a href="xacml-php/description.php">XACML</a>
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
        <a href="../../php/index.php" id="logout">Logout</a>
    </div>
</nav>

<div class="login-form">
    <form action="homepage.php" method="post">
       <h2 align="center"><a href="#Smart IoT Parking">Smart IoT Parking :</a></h2>
        <h2 id="description">Description</h2>

<p><img src="../images/smartpark1.jpg" alt="Description" title="Description " style="float: right;width: 500px;height: 300px ; margin-left: 30px;"/></p>

<p>Smart Parking allows the development of car parks thanks to new technologies.</p>

<p>It solves the common problems of the users and allows in particular : </p>

<ul>
<li><em>Time saving thanks to the guidance instead (Sending of the availability of the places to the adequate places)</em>.</li>

<li><em>High energy saving thanks to the significant reduction of carbon during the research of the users</em>.</li>

<li><em>To ensure an important security, serenity and user-friendliness by the establishment of adequate access control for the user.<em>.</li>
</ul>
<br>
<br>
<h2 float ="right" id="fonctionnement">Operation</h2>

<p>Our Smart Parking with a large number of parking spaces has only one entrance and one exit.</p>

<p>We will consider in our case only two areas: <em>a standard area </em> a standard area that is accessible to all (public) , and <em>  a privileged access area</em>.
For the identification process when requesting a parking space, a vehicle is identified by its <strong><em>plate</em></strong>, and the user must then submit a
<strong><em>identification badge (blue or red badge)</em></strong> for access to one of the zones.</p>

<p>For the process of choosing the node after presenting the user's badge,the algorithm will have to select the appropriate central node to process the incoming request using the color of the user's badge.</p>

<p>The principle of operation of objects, and of the whole environment in general is as follows: </p>

<ul>
<li><strong><em>At the level of the objects : </em></strong> Various internal processes make it possible to determine the value of the places available thanks to the <strong>ultrasonic sensors</strong> connected to arduino cards and which detect the presence of an object. The arduino cards then send this data to the central node. When the ultrasonic sensors detect a presence, LEDs of different colors are lit to indicate the number of places available thereafter. </li>
</ul>

 
<ul>
<li><strong><em>At the central node level : </em></strong> The data from arduino cards every 30s, are retrieved via serialport technology and then sent to <strong>the local server</strong> that will store the data file. The next step is the transmission of data to the <strong>ThingSpeak</strong> platform for visualization. This last step will be done through the creation <strong> of a channel and the use of the API key</strong> provided by ThingSpeak.</li>
<p  align="center">A description and more information about the installation procedure is available from the github link of <a href="https://github.com/esalim/PerBAC"><strong><em>PerBAC</em></strong></a></p>
    <br>
    <p><img src="../images/smartpark2.jpg" alt="Traitement 1" title="Traitement 1 " style="float: right;width: 600px;height: 400px ; margin-right: 0px;margin-bottom:60px"/></p>
<p><img src="../images/smartpark3.jpg" alt="Traitement 2" title="Traitement 2 " style="float: left;width: 600px;height: 400px ; margin-right: 0px;margin-bottom:60px"/></p>
</ul>


<br>
<br> 
<br>
<h2 id="contrledaccs">Access control </h2>

<p>Security is a very important factor in the implementation of new technologies aimed at improving the living conditions of users. For this reason, we have taken care to implement various security access controls within our platform.</p>

<p>These access controls all have specific capabilities that allow them to meet the diverse needs of users while implementing flexible and robust access policies.</p>

<p>The different access controls implemented are <strong><em>RBAC , ABAC , XACML(ABAC) &amp; PerBAC</em></strong>.</p>

<p><em>The platform integrates a descriptive file, evaluation tests of each access control model as well as a comparative section according to various criteria of the implemented models. These elements are available at the 
 <strong>the tabs of the navigation bar</strong></em>.</p>
    </form>
</div>
</body>
</html>
