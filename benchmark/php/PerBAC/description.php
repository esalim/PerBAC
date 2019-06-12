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
    <link rel="stylesheet" href="description.css">                                                                 <!-- Appel fichier xacml.css pour mise en forme -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>                                                <!-- Importation de la library SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">           <!-- Importation de la library Animate -->

</head>
<body>
<nav>

    <div class="topnav">   <!-- affichage de la barre de navigation -->
        <a class="headlogo"> <img height="50"  width="50" src="../../images/smart_parking.png" alt="logo"> </a>
        <a href="../../home/index.html">Home</a>
        <a  href="../websocket.php">Dashboard</a>
        <a  href="../zend-rbac/description.php">RBAC</a>
        <a href="../php-abac/description.php">ABAC</a>
        <a class="active" href="description.php">PerBAC</a>
        <a  href="../xacml-php/description.php">XACML</a>
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
    <a class="active"  href="description.php" ><i class="fa fa-fw fa-newspaper-o"></i> Description</a>
    <a  href="perbac.php"><i class="fa fa-fw fa-wrench"></i> Test</a>
</div>

<div class="content">
    <div class="login-form">
        <br>
        <h2 align="center"><a href="#modèle-pervasive-base-access-control-perbac" id="modèle-pervasive-base-access-control-perbac">Modèle Pervasive Base Access Control (PerBAC)</a></h2>
        <p>Compte tenu des limites rencontrées des modèles de contrôles d'accès populaires et largement adoptés dans des environnements IdO,
            et surtout de l'importance des contrôles d'accès dans de tels environnements, un sérieux besoin d'une solution adaptée à l' IdO s'impose.</p>
        <p>C'est ainsi que le modèle de control d'accès <em><strong>PerBAC (Pervasive Base Access Control)</strong></em> essentiellement basée sur <strong>ABAC</strong> a vu le jour.</p>
        <p>Ce modèle utilise <em>le concept d'attributs</em>, ce qui est très avantageux dans les environnements décentralisés IdO, et comprend également plusieurs <em>concepts abstraits</em> et d'autres modèles AC génériques tels que <strong>RBAC</strong>.</p>
        <p>Nous enrichissons ABAC non seulement avec des <em>fonctionnalités supplémentaires de OrBAC et ses extensions</em>, mais aussi avec <em>une approche de sécurité originale</em> qui répond aux exigences de base IdO.</p>
        <p>Il s'agit là d'une approche proactive, qui permet l'utilisation intelligente des attributs et des entités abstraites bien connues.</p>
        <p><img src="../../images/per1.png" alt="Entités PerBAC" title="Les Entités du modèle PerBAC " style="float: right;"/></p>
        <p style="float: left">Le modèle PerBAC, puisque possédant des fonctionnalités de OrBAC caractérise toutes ses entités par des attributs
            qui sont des caractéristiques du sujet, objet, ou dans des conditions d'environnement.</p>
        <p>On retrouve également la notion d'attributs abstraits (tels que le rôle, l'activité, la vue et le contexte).</p>
        <p>PerBAc est un modèle multi-couche possédant le concept d'attributs comme un élément essentiel
            ce qui le rend <em><strong>plus dynamique, pro-actif et très apte</strong></em> à répondre aux besoins du contexte IdO.</p>
        <p>Les attributs de la couche abstraite sont considérées comme logiques / attributs abstraits avec de nombreuses conditions,
            alors que les attributs de la couche physique sont des attributs physiques.</p>
        <p>Le concept de mise en correspondance dans PerBAC
            est relativement simple : si les attributs d'une entité concrète (sujet, objet ou action) caractérisent l'entité abstraite correspondante (rôle, vue ou d'une activité, respectivement),
            alors le premier est automatiquement adaptée à celle-ci.</p>
        <p>Les attributs d'une organisation seront en même temps concret et abstrait.</p>
        <p>La prise de décision d'autorisation ou refus de l'accès à un sujet pour une ressource demandée (objet) se passe selon la figure illustrative ci contre</p>
        <p><img src="../../images/per2.png" alt="Processus decision PerBAC" title="Processus de decision PerBAC" style="float: left; margin-right: 20px;width: 780px"/></p>
        <ol>
            <li>
                <p>L'objet <em>s</em> envoie d'abord une demande <strong>REQ (org, s, o, a)</strong> à un objet <em>o</em> demandé la sur lequel elle veut effectuer une action <em>a</em>.
                    Cette demande venant de l'organisation <em>org</em> contient la ressource demandée, les spécifications du sujet, objet et action.</p>
            </li>
            <li>
                <p>La demande est reçue par le <strong>PEP</strong> et ensuite redirigé vers le <strong>PDP</strong> après l'extraction de certains attributs globaux
                    également appelés attributs environnementaux <em>(att)</em> . <strong>PDP</strong> envoie une demande au <strong>PIP</strong> pour les attributs des entités
                    qu'il vient de recevoir.
                    Une fois que ceux - ci sont obtenus, la demande sera transmise à la fonction de <em>correspondance
                        pour concaténer</em> les entités concrètes et celles abstraites.</p>
            </li>
            <li>
                <p>Maintenant que toutes les informations nécessaires sur toutes les parties prenantes ont été recueillies,
                    le <strong>PDP</strong> recherche la <em>politique AC</em> de l'organisation et prend la <em>bonne décision</em> sur la base des informations traitées.
                    Cette décision est ensuite envoyée au <strong>PEP</strong>, qui informe <em>le sujet demandeur</em>.</p>
            </li>
        </ol>
        <p>La plupart du temps, les nœuds centraux jouent le rôle du PEP pour leurs noeuds d'extrémité,
            la couche moins contrainte, la couche de calcul / déchargement aura un composant nuage ou un serveur dédié.
            Ce composant remplit les rôles du PDP / PIP / PAP et peut correspondre à différents attributs permettant d'accélérer le processus de décision.</p>
        <p>Pour l'implementation du modèle au sein de notre plate-forme <em><strong>IoT Smart Parking</strong></em> nous avons suivi les diagrammes suivants :</p>
        <p>Notre Parking intelligent disposant d'un grand nombre de places de stationnement ne possède qu'une entrée et une seule sortie. En outre,
            les espaces de stationnement sont divisés en plusieurs domaines ou zones, dont chacun est géré par un noeud central.</p>
        <p>Nous considérerons deux zones : <em><strong>une Zone Standard</strong></em> qui est accessible à tous (public) dans le cadre d'un marché public, et une <em><strong>Zone à Accès Privilégiée</strong></em> .</p>
        <p>L'accès aux zones est identifié par un Badge <strong>Rouge</strong> ou <strong>Bleu</strong>.</p>
        <p>Pour <em><strong>le processus d'Identification</strong></em> lors de la demande d'une place de parking , un véhicule est identifié par sa plaque ,
            et l'utilisateur doit alors présenter un badge d'identification.</p>
        <p>Pour <em><strong>le processus de choix du noeud</strong></em>  après presentation du badge de l'utilisateur l'algorithme devra sélectionner le noeud central approprié pour traiter la requête entrante.
            en fonction de la couleur du Badge , l'un des noeuds centraux traitera la demande.</p>
        <p>Ce sera le <em>Noeud central standard (CN_STANDARD) pour le <strong>Badge Bleu</strong></em> ou le <em>Noeud central privilégié (CN_STANDARD) pour le <strong>Badge Rouge</strong></em></p>
        <p>Pour <em><strong>le processus de contrôle d'accès</strong></em> après avoir sélectionné le noeud central approprié, l'algorithme lance le processus de prise de décision pour déterminer l' accès à la ressource (espace de stationnement).</p>
        <p>Ci-dessous les <em><strong>diagrammes de séquence UML explicatifs</strong></em> du processus de <em><strong>sélection d'un noeud central (première)</strong></em> ainsi que du <em><strong>controle d'accès (deuxième)</strong></em> .</p>
        <p align="center"><img src="../../images/per3.png" alt="Choix Noeud PerBAC" title="Choix Noeud PerBAC" /></p>
        <p align="center"><img src="../../images/per4.png" alt="Controle d'accès PerBAC" title="Controle d'acces PerBAC" /></p>
        <p><em>Nous retrouverez  l'implementation sur notre plateforme IoT Smart Parking grace à la section <em><strong><a href="perbac.php">Test</a> </strong></em></em></p>
        <p>Une <em>video test</em> du contrôle d'accès est aussi implementée à l'aide du <strong>Langage JAVA</strong> et de l'usage de <strong>Fichiers JSONs</strong> se trouve également dans la section <em><strong>Test-Video</strong></em></p>

        <br>
    </div>
</div>

</body>
</html>


