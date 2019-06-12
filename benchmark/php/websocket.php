
<?php
session_start();   // ouverture d'une session
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Système Smart Parking</title>
    <link rel="stylesheet" href="../css/style.css">   <!-- Appel fichier style.css pour mise en forme -->
    <script src="../php/websocket_client.js"></script>    <!-- Appel fichier websocket.js pour recuperer des valeurs envoyer par le cloud -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>    <!-- Importation de la library SweetAlert2 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>   <!-- Importation de la library Jquery -->

    <style>   /* Style de la page */
        rainbowParking {
            display: block;
            background-color: #dddddd;
            padding: 30px;
            font-size: 55px;
            line-height: 40%;
            margin-left:20px;
            margin-right:20px;
            border-style: groove;
        }

        indigoParking {
            display: block;
            background-color: #dddddd;
            padding: 30px;
            font-size: 55px;
            line-height: 40%;
            margin-left:20px;
            margin-right:20px;
            border-style: groove;
        }
        div.container {
            margin: 5px;
        }
        div.left, div.right {
            float: left;
            padding: 5px;
        }
        div.left {
            background-color:white;
            width:1230px;
            height:450px;
        }
        div.right {
            background-color: #dddddd;
            width:400px;
            height:450px;
            margin-top:0px;
            margin-bottom:0px;
        }


    </style>
</head>

<body onload="javascript:init()">
<nav>

    <div class="topnav">   <!-- affichaage de la barre de navigation -->
        <a class="headlogo"> <img height="50"  width="50" src="../images/smart_parking.png" alt="logo"> </a>
        <a href="../home/index.html">Home</a>
        <a class="active" href="#dashboard">Dashboard</a>
        <a href="zend-rbac/description.php">RBAC</a>
        <a href="php-abac/description.php">ABAC</a>
        <a href="PerBAC/description.php">PerBAC</a>
        <a href="xacml-php/description.php">XACML</a>
        <a href="resultats.php">Comparatifs & Résultats</a>


        <div class="dropdown">
            <button class="dropbtn">Sign In/Sign Up
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="../php/index.php">Sign In</a>
                <a href="../php/enregistrement.php">Sign Up</a>
            </div>
        </div>
        <a href="../php/index.php" id="logout">Sortir</a>
        <h2 id="bvn"> <?php echo 'Bienvenue ' .$_SESSION['userName']. ' ('. $_SESSION['userFonct'].')' // affichage identifiants users à droite de la barre de navigation ?> </h2>
    </div>
</nav>
<h2 style="color:mediumspringgreen;text-align:center;font-size: 50px"><em>Système Smart Parking</em></h2>
<form action="websocket.php" method="post">   <!-- section affichage données envoyés par le cloud  -->
    <div class="container">
        <div class="left">
            <h1 style="line-height: 60%; color:dodgerblue;margin-left:40px">Parking du personnel</h1>
            <h4 style="line-height: 10%; margin-left:40px"><em>MIT Marrackech, 38 Sidi Abbad, Marrakech</em></h4>
            <rainbowParking id="Personnel">Reception des données...</rainbowParking>
            <h1 style="line-height: 30%; color:white;margin-left:40px">1</h1>
            <h1 style="line-height: 60%; color:dodgerblue;margin-left:40px">Parking des étudiants ou invités</h1>
            <h4 style="line-height: 10%; margin-left:40px"><em>MIT Academy, 40 Sidi Abbad, Marrakech</em></h4>
            <indigoParking id="Etudiants">Reception des données...</indigoParking>
        </div>
        <div class="right">
            <div id="map" style="width:100%;height:100%">

            </div>
        </div>
    </div>

<?php

?>

    <div id = "websocketelements">
        <div id="attributes_log"> </div>
    </div>

    <div id="close">
        <a href="javascript:onClose()"></a>  <!--Fermeture de la connexion avec le Système Smart Parking-->
    </div>

    <h4></h4> <!--Console de sortie-->

    <div id="output"></div>


    <script>   /* script utiliser google api pour l'integration d'une map */
        function myMap() {
            var mapCanvas = document.getElementById("map");
            var mapOptions = {
                center: new google.maps.LatLng(31.655730, -8.012123), // coordonnées zone centrale map
                zoom: 15
            }
            var map = new google.maps.Map(mapCanvas, mapOptions);

            var rainbow_marker = new google.maps.Marker({   // création + coordonnées parking 1
                // The below line is equivalent to writing:
                // position: new google.maps.LatLng(31.656347, -8.014218),
                position: {lat: 31.656289, lng: -8.014264},
                map: map
            });

            var indigo_marker = new google.maps.Marker({    // creation + coordonnées parking 1
                // The below line is equivalent to writing:
                //position: new google.maps.LatLng(31.656381, -8.014318),
                position: {lat: 31.656065, lng: -8.014397 },
                map: map
            });

            var infowindow = new google.maps.InfoWindow({   // affichage de l'info lors du clic
                content: '<p>Parking du Personnel, 38, Sidi Abad 1</p>'
            });
            var infowindowindigo = new google.maps.InfoWindow({  // affichage de l'info lors du clic
                content: '<p>Parking des etudiants ou invités, 40, Sidi Abad 1</p>'
            });

            google.maps.event.addListener(rainbow_marker, 'click', function() {
                infowindow.open(map, rainbow_marker);
            });

            google.maps.event.addListener(indigo_marker, 'click', function() {
                infowindowindigo.open(map, indigo_marker);
            });

        }
    </script>
    <!-- Entrée de la clé de l'api de google après key = ...... pour l'obtention de la Map-->
    <script async defer src="https://maps.googleapis.com/maps/api/js?&callback=myMap"></script>
</form>

</body>
</html>


<?php

?>

