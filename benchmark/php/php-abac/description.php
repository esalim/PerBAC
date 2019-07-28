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
    <link rel="stylesheet" href="description.css">                                                                 <!-- Appel fichier abac.css pour mise en forme -->
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
    <a class="active" href="description.php" ><i class="fa fa-fw fa-newspaper-o"></i> Description</a>
    <a href="abac.php"><i class="fa fa-fw fa-wrench"></i> Test</a>
</div>

<!-- Page content -->
<div class="content">
    <div class="login-form">
        <br>
        <h2 align="center"><a href="#modèle-attribute-based-access-control-abac" id="modèle-attribute-based-access-control-abac">Modèle Attribute Based Access Control (ABAC)</a></h2>
        <p>Le Contrôle d'accès basé sur les attributs (ABAC), également connu sous le contrôle d'accès basé sur
            la stratégie , définit un contrôle d'accès dans lequel les droits d'accès sont accordés
            aux utilisateurs par l'utilisation de politiques qui combinent les attributs ensemble.</p>
        <p>Il s'agit là qui permet d'évaluer de <em><strong>manière dynamique</strong></em> des politiques de sécurité numérique par rapport
            aux <em><strong>valeurs d'attributs pertinents</strong></em> et détermine si la demande d'un utilisateur sera <em><strong>autorisé ou pas</strong></em>.</p>
        <p>Contrairement au contrôle d'accès basé sur les rôles (RBAC), la principale différence avec l'ABAC
            est le concept des politiques qui expriment un <em><strong>ensemble de règles booléenne complexes</strong></em>
            qui permet d'évaluer de nombreux attributs différents.</p>
        <p> ABAC fonctionne selon l'architecture suivante :</p>
        <ol>
            <li>
                <p><em><strong> Le PEP ou la politique Enforcement Point :</strong></em> il est responsable de la protection des
                    données et des applications sur lequelles on souhaite appliquer ABAC. Le PEP inspecte la demande puis génère une demande d'autorisation qui sera envoyé au PDP.
                    La décision PDP ou la politique de point est le cerveau de l'architecture. Il s'agit là pièce qui évalue les demandes entrantes contre les politiques qu'il a été configuré avec.
                    Le PDP retourne un Permis / Deny décision.</p>
            </li>
            <li>
                <p><em><strong>Les Attributs :</strong></em> peuvent etre de tout type et appartenir à tout le monde.On retrouve generalement quatre(4) principaux types :</p>
            </li>
        </ol>
        <ul>
            <br>
            <li><strong>les attributs Sujets</strong> qui décrivent l'utilisateur qui tente de l'âge par exemple l'accès, l'autorisation, le rôle...</li>
            <br>
            <li><strong>les attributs Action</strong> qui décrivent l'action tentée de lecture par exemple, supprimer, afficher, approuver ...</li>
            <br>
            <li><strong>les attributs Objets</strong> qui décrivent l'objet (ou ressource) étant accessibles par exemple le type d'objet (dossier médical, compte bancaire ...), le département, la classification ou de la sensibilité, l'emplacement ...</li>
            <br>
            <li><strong>les attributs Contextuelles (environnementaux)</strong> qui traitent avec le temps, le lieu ou les aspects dynamiques du scénario de contrôle d'accès.</li>
        <br>
        </ul>
        <ol start="3">
            <li><em><strong>Les Politiques:</strong></em> sont des déclarations qui amènent les attributs ensemble pour exprimer ce qui peut arriver et n'est pas autorisé.</li>
        </ol>
        <p> Nous retrouvons ci dessous une figure illustrative du modèle  :</p>
        <br>
        <p align="center"><img src="../../images/authorizationdiagram.png" height="420"  width="820" alt="ABAC Modèle" title="ABAC Modèle d'acces " /></p>
        <br>
        <p>Comme le montre la figure ci dessus, les demandes pour l'acces à une ressource
            une ressource sont interceptés par le point d'application de la politique (PEP)
            et redirigé vers un service de point de décision de décision politique / politique (PDP / PDS).
            Les demandes seront evaluées en temps réel, suivant une politioque de regle qui soutiennent la logique booléenne, dans lequel les règles contiennent des boucles  « SI, alors » au sujet (utilisateur) de qui fait la demande, la ressource, et l'action.</p>
        <p>Pour l'implementation du modèle au sein de notre plateforme <em><strong>IoT Smart Parking</strong></em> nous avons fait appel à une base de données en ligne (stockage des places disponibles) ainsi qu'à <a href="https://docs.zendframework.com/zend-permissions-rbac/intro/"><em><code>Casbin(PHP)</code></em></a> ,
            une bibliotheque de contrôle d'accès open source puissant et efficace fonctionnant suivant un fichier <em><strong>.conf</strong></em> contenant
            l'ensemble de nos regles et un fichier <em><strong>.csv</strong></em> (base de données des attributs ) qui fera sera comparée aux données de la base de données en lignées.</p>
        <p>  Plus d'informations à partir du diagramme de notre modèle :</p>
        <br>
        <p align="center"><img src="../../images/abacdec.PNG" height="620"  width="920" alt="ABAC Diagramme" title="ABAC Politique d'acces " /></p>
        <br>
        <p>ABAC est considéré une « prochaine génération » parce qu’il offre une
            <em><strong>approche dynamique, contextuelle et axée sur les risques. . .un contrôle d’accès intelligent aux ressources</strong></em>
            permettant de définir des politiques de contrôle d’accès qui incluent des attributs spécifiques
            de nombreux systèmes d’information différents afin de <em><strong>résoudre une autorisation et d’assurer une conformité réglementaire efficace</strong></em>,
            ainsi que permettre aux entreprises de faire preuve de souplesse dans leur mise en œuvre en fonction de leurs infrastructures existantes.</p>
        <p><em>Nous retrouverez  l'implementation sur notre plateforme IoT Smart Parking grace à la section <em><strong><a href="abac.php">Test</a> </strong></em></em></p>
<br>
    </div>
</div>

</body>
</html>



