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
    <link rel="stylesheet" href="description.css">                                                                 <!-- Appel fichier rbac.css pour mise en forme -->
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
    <a  class="active" href="description.php" ><i class="fa fa-fw fa-newspaper-o"></i> Description</a>
    <a  href="rbac.php"><i class="fa fa-fw fa-wrench"></i> Test</a>
</div>
<!-- Page content -->
<div class="content">
    <div class="login-form">
        <br>
        <h2><a href="#modèle-role-based-access-control-rbac" id="modèle-role-based-access-control-rbac"> &nbsp; Modèle Role Based Access Control (RBAC)</a></h2>
                <p>Le contrôle d'accès basé sur les rôles (RBAC) est un modèle et une structure de contrôle d'accès
                permettant de <em><strong>contrôler l'accès des utilisateurs aux ressources en fonction de leurs rôles</strong></em>  .</p>
                <p> Un rôle découle généralement de la structure d'une entreprise. Les utilisateurs exerçant des fonctions similaires peuvent être regroupés sous le même rôle (<em>Ex</em> : comptable , commercial...)
                </p>
                <p> Il s'agit là d'un lien entre les utilisateurs et les ressources.</p>
                <p> Un rôle, déterminé par une autorité centrale, associe à un sujet des autorisations d'accès sur un ensemble d'objets.</p>
                <p>Nous retrouvons ci dessous une figure illustrative du modèle  :</p>
                <br>
                <p align="center"><img src="../../images/rbac_overview.png" alt="RBAC Modèle"  height="420"  width="1320" title="Role Based Access Control Model " /></p>
                <br>
                <p>Pour l'implementation du modèle au sein de notre plateforme <em><strong>IoT Smart Parking</strong></em> nous avons fait appel à une base de données en ligne (stockage des places disponibles) ainsi qu'à <a href="https://docs.zendframework.com/zend-permissions-rbac/intro/"><em><code>zend-framework</code></em></a> , un framework qui contient les classes descriptives et presente le modèle RBAC de la manière suivante :</p>
                <ul>
                    <li><em>Une identité a un ou plusieurs rôles.</em></li>
                    <li><em>un rôle demande l'accès pour l'autorisation à une ressource</em></li>
                    <li><em>une autorisation est donnée à un rôle.</em></li>
                </ul>
                <p>Cela bien evidemment en fonction de la politique d'accès (régles de sécurité) presente sur la plateforme.</p>
                <p>Ci dessous un diagramme explicatif de la proceduire d'accès :</p>
                <br>
                <p align="center">
                    <img  src="../../images/rbacdec.PNG" align="center" height="620"  width="1320" alt="RBAC Diagramme" title="RBAC Politique d'acces " /></p>
                <br>
                <p>Le modèle RBAC, dans sa forme la plus simple ou la plus complexe, permet, quand il est compris et maitrisé,
                    <em><strong>d’augmenter la performance opérationnelle d’attribution des droits</strong></em>
                    aux utilisateurs et apporte ainsi une <em><strong>réduction conséquente de coût sur la gestion des identités</strong></em> de l’entreprise.</p>
        <p><em>Nous retrouverez  l'implementation sur notre plateforme IoT Smart Parking grace à la section <em><strong><a href="rbac.php">Test</a> </strong></em></em></p>
                <br>
    </div>
</div>
</body>
</html>


