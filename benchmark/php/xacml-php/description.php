<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controle d'acces XACML</title>
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
        <a href="../../php/homepage.php">Description</a>
        <a  href="../zend-rbac/description.php">RBAC</a>
        <a href="../php-abac/description.php">ABAC</a>
        <a href="../PerBAC/description.php">PerBAC</a>
        <a class="active" href="description.php">XACML</a>
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
    <a  href="xacml.php"><i class="fa fa-fw fa-wrench"></i> Test</a>
</div>

<div class="content">
    <div class="login-form">
        <br>
        <h2 align="center"><a href="#standard-xacml-appliqué-au-modèle-de-controle-daccès" id="standard-xacml-appliqué-au-modèle-de-controle-daccès">Standard XACML appliqué au modèle de controle d'accès</a></h2>
        <p><em><strong>XACML  (eXtensible Access Control Markup Language)</strong></em> est un langage de contrôle d’accès basé sur XML normalisé par <strong>OASIS (Organisation pour l’avancement des normes d’information structurée)</strong>
            qui décrit à la fois un <em>langage de stratégie de contrôle d'accès qui est ABAC et un langage de décision de contrôle d'accès (demande / réponse).</em></p>
        <p>Il s'agit là d'une spécification qui définit la circulation des règles , l'administration de la politique de sécurité des systèmes d'information et
            qui assure la fonction d'autorisation dans les architectures <strong>SOA (Service Oriented Architecture)</strong></p>
        <p>XACML est principalement un contrôle d'accès basé sur les attributs système <strong>(ABAC)</strong>,
            où les attributs (bits de données) associées à un utilisateur ou d'une action ou
            d'une ressource sont entrées dans la décision de savoir si
            un utilisateur donné peut accéder à une ressource donnée d'une manière particulière.</p>
        <p>Le Contrôle d'accès basé sur les rôles <strong>(RBAC)</strong> peut également être mis en œuvre dans XACML comme une spécialisation de ABAC.</p>
        <p>XACML définit les composants suivants:</p>
        <ul class="test">
            <li><em><strong>Policy Enforcement Point (PEP) :</strong></em>  Il s'agit du point d'application de la décision. Il intercepte la demande d'accès de l' utilisateur à une ressource, fait une demande de décision au PDP pour obtenir la décision d'accès (accès à la ressource est approuvée ou rejetée)  et agit sur la décision reçue.Le PEP protège l'application ciblée.</li>
            <li><em><strong>Policy Decision Point (PDP) :</strong></em> C'est le point de décision de la politique. Le PDP est le moteur de l'architecture. C'est l'endroit où les politiques sont évaluées et comparées contre les requêtes d'autorisation.</li>
            <li><em><strong>Policy Information Point (PIP) :</strong></em> Le point d'information est le point où le PDP peut se connecter à des sources externes d'attributs comme LDAP ou une base de données. L'idée est que lors de l'évaluation d'une requête contre une politique, le PDP a besoin d'informations (attributs) supplémentaires pour obtenir une décision.</li>
            <li><em><strong>Policy Retrieval Point (PRP) :</strong></em> Il s'agit du point de stockage des politiques. En somme, le PRP n'est qu'une base de données ou un endroit dans un dossier où sont stockées les politiques.</li>
            <li><em><strong>Policy Administration Point (PAP) :</strong></em> Le point d'administration des politiques est l'endroit où les politiques de contrôle d'accès sont éditées.</li>
        </ul>
        <p>L'image ci dessous montre l'architecture XACML et un flux d'autorisation de l'échantillon.</p>
        <p><img src="../../images/XACML.png" style="width : 600px ; height: 400px ; float: left ; margin-bottom: 10px ; margin-right: 65px"  alt="Standard XACML" title="XACML Flux d'autorisation" styl/></p>
        <ol style="line-height: 45px">
                <li>Un utilisateur envoie une requête qui est interceptée par la politique Enforcement Point (PEP)</li>
                <li>Le PEP convertit la demande en une demande d'autorisation XACML</li>
                <li>Le PEP transmet la demande d'autorisation à la point de décision politique (PDP)</li>
                <li>Le PDP évalue la demande d'autorisation contre les politiques qu'il est configuré avec. Les politiques sont acquises par la politique point de récupération (PRP) et gérés par la politique Point d'administration (PAP). Si nécessaire, il récupère également les valeurs d'attribut de points d'information sur les politiques sous-jacentes (PIP).</li>
                <li>Le PDP prend une décision (permis / Refuser / Nonapplicable / indéterminés) et le renvoie à la PEP</li>
        </ol>
        <br>
        <p>Pour l'implementation du modèle au sein de notre plateforme <em><strong>IoT Smart Parking</strong></em> nous avons fait appel à une base de données en ligne (stockage des places disponibles) ainsi qu'à <a href="https://github.com/enygma/xacmlphp"><em><code>OASIS/XACML Library</code></em></a> ,
            une bibliothèque implémentant la norme OASIS / XACML pour l'autorisation basée sur des règles.</p>
        <p>Il s'agit là d'une structure XML bien définie permettant d’évaluer les attributs de stratégies en fonction d’attributs de sujets afin de déterminer s’il existe une correspondance (en fonction de règles d’opération et de combinaison d’algorithmes).</p>
        <p>Plus d'informations à partir du diagramme de notre modèle :</p>
        <p><img src="../../images/xacmldec.png" alt="XACML" title="XACML Proceduire " style="float: left;width: 700px;height: 600px ; margin-right: 40px"/>
            <img src="../../images/xacml2.png" alt="XACML Diagramme" title="XACML Diagramme " style="float: right ; width: 630px;height: 600px;margin-left: 15px"/></p>
        <br>
        <p>XACML conjointe à ABAC est très <em><strong>flexible et offre énormément de possibilités</strong></em>
            puisque que l'on peut améliorer grandement <em>la performance d'autres models (RBAC , MAC...).</em>
            C'est un <em><strong>modèle architectural clair et utile</strong></em> bien au delà d'ABAC de par la syntaxe de ce langage et des outils réliés
            meme si ce langage n'est pas <em>très conviviale et sa puissance peut etre difficile à maîtriser</em>.</p>

        <p><em>Nous retrouverez  l'implementation sur notre plateforme IoT Smart Parking grace à la section <em><strong><a href="xacml.php">Test</a> </strong></em></em></p>
        <br>
    </div>
</div>

</body>
</html>

