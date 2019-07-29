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

<div class="login-form">
    <form action="homepage.php" method="post">
        <h2 align="center"><a href="#Smart IoT Parking">Smart IoT Parking :</a></h2>
        <h2 id="description">Description</h2>

<p><img src="../images/smartpark1.jpg" alt="Description" title="Description " style="float: right;width: 500px;height: 400px ; margin-left: 30px;"/></p>

<p>Aujourd’hui, plus d’un citadin sur deux exprime un besoin grandissant en termes de mobilité.
La mobilité n’est pas uniquement basée sur le développement d’infrastructures et de services de transport ; elle est aussi le fait de s’intéresser au comportement de la populations dans ses déplacements.</p>

<p>La motorisation de la population continue ainsi de croître, ce qui rend inévitable <em>l’augmentation de la consommation énergétique et des émissions de carbone</em>.
Afin de pallier à ce problème , une solution est née : l'utilisation des <strong><em>Smart Parking</em></strong>. Il s'agit là de l’aménagement des parkings grâce aux nouvelles technologies.</p>

<p>Il règle les problèmes communs des usagers et permet notamment :</p>

<ul>
<li><em>Gain de temps grâce au guidage à la place (Envoi de la disponibilité des places vers les emplacements adéquats)</em>.</li>

<li><em>Forte économie d'energie grace à la réduction significative de carbone lors de la recherche des usagers</em>.</li>

<li><em>D'assurer une importante sécurité, sérénité et convivialité par la mise en place de contrôle d'accès adéquat pour l'utilisateur<em>.</li>
</ul>
<br>
<br>
<h2 float ="right" id="fonctionnement">Fonctionnement</h2>

<p>Notre Parking intelligent disposant d’un grand nombre de places de stationnement ne possède qu’une entrée et une seule sortie.En outre, les espaces de stationnement sont
divisés en plusieurs domaines ou zones, gérées chacune par un noeud central.</p>

<p>Nous considérerons dans notre cas uniquement deux zones : <em>une zone standard</em> qui est accessible à tous (public) , et <em>une zone à accès privilégiée</em>.
Pour le processus d’identification lors de la demande d’une place de parking, un véhicule est identifié par sa <strong><em>plaque ou un tag RFID</em></strong>, et l’utilisateur doit alors présenter un
<strong><em>badge d’identification (badge bleu ou rouge)</em></strong> pour l'accès à l'une des zones.</p>

<p>Pour le processus de choix du noeud après présentation du badge de l’utilisateur,l’algorithme devra sélectionner le noeud central approprié pour traiter la requête entrante
et ce en se servant de la couleur du badge de l’utilisateur.</p>

<p>Le principe de fonctionnement des objets, et de tout l’environnement en général se présente ainsi :</p>

<ul>
<li><strong><em>Au niveau des objets :</em></strong> Différents traitements internes permettent de déterminer la valeur des places disponibles grâce aux <strong>capteurs ultrasons</strong> connectés aux cartes arduino et qui détectent la présence d’un objet. Les cartes arduino envoient ensuite ces données au niveau du nœud central.Lorsque les capteurs ultrasons détectent une présence, des LEDs de couleurs différentes sont allumées afin d’indiquer le nombre de places disponibles par la suite.</li>
</ul>

<ul>
<li><strong><em>Au niveau du nœud central :</em></strong> Les données provenant des cartes arduino chaque 30s, sont récupérées via la technologie serialport puis envoyées vers <strong>le serveur local</strong> qui stockera le fichier de données. L'etape suivante est la transmission des données vers la plateforme <strong>ThingSpeak</strong> pour la visualisation. Cette dernière étape se fera grace à la création d'une <strong>channel et l'utilisation de la clé API</strong> fourni par ThingSpeak.</li>
<p  align="center">Un description et de plus amples informations sur la proceduire d'installation sont disponibles à partir du lien github <a href="https://github.com/esalim/PerBAC"><strong><em>PerBAC</em></strong></a></p>
    <br>
    <p><img src="../images/smartpark2.jpg" alt="Traitement 1" title="Traitement 1 " style="float: right;width: 780px;height: 400px ; margin-right: 0px;margin-bottom:60px"/></p>
<p><img src="../images/smartpark3.jpg" alt="Traitement 2" title="Traitement 2 " style="float: left;width: 780px;height: 400px ; margin-right: 0px;margin-bottom:60px"/></p>
</ul>


<br>
<br> 
<br>
<h2 id="contrledaccs">Contrôle d'accès</h2>

<p>La sécurité est un facteur très important dans l'implementation de nouvelles technologies visant à améliorer les conditions de vie des usagers. C'est pour cette raison que nous avons pris soin d'implementer divers contrôles d'accès de sécurité au sein de notre plate-forme.</p>

<p>Ces contrôles d'accès possèdent tous des fonctionnalités spécifiques leur permettant de satisfaire les divers besoins des utilisateurs tout en implémenter des politiques d'accès robustes et flexibles.</p>

<p>Les différents contrôles d'accès implémentés sont <strong><em>RBAC , ABAC , XACML(ABAC) &amp; PerBAC</em></strong>.</p>

<p><em>La plateforme intégre un fichier descriptif , des tests d'evalutions de chaque modèle de contrôle d'accès ainsi qu'une section comparatives selon divers critères des modèles implémentés.Ces elements sont disponibles au niveau des <strong>onglets de la barre de navigation</strong></em>.</p>
    </form>
</div>
</body>
</html>
