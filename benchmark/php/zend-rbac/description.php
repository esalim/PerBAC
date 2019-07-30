<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RBAC Access Control</title>
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
        <a href="../resultats.php">Comparatives & Results</a>


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
<!-- The sidebar -->
<div class="sidebar">
    <a  class="active" href="description.php" ><i class="fa fa-fw fa-newspaper-o"></i> Description</a>
    <a  href="rbac.php"><i class="fa fa-fw fa-wrench"></i> Test</a>
</div>
<!-- Page content -->
<div class="content">
    <div class="login-form">
        <br>
        <h2 align ="center"><a  href="#modèle-role-based-access-control-rbac" id="modèle-role-based-access-control-rbac"> &nbsp; Role Based Access Control (RBAC) Model </a></h2>
                <p>
                 
                Role Based Access Control (RBAC) is a model and access control structure that <em><strong>controls 
                user access to resources based on their roles</strong></em>.</p>
                <p> A role usually stems from the structure of a company. Users with similar functions can be grouped under the same role (<em>Ex</em> : accountant , commercial...)</p>
                <p> This is a link between users and resources.</p>
                <p> A role, determined by a central authority, associates a subject with access permissions on a set of objects.</p>
                <p>We find below an illustrative figure of the model : </p>
                <br>
                <p align="center"><img src="../../images/rbac_overview.png" alt="RBAC Modèle"  height="380"  width="1000" title="Role Based Access Control Model " /></p>
                <br>
                <p>For the implementation of the model within our platform <em><strong>IoT Smart Parking</strong></em> we used an online database (storage of available places) and <a href="https://docs.zendframework.com/zend-permissions-rbac/intro/"><em><code>zend-framework</code></em></a> , a framework that contains the descriptive classes and presents the model RBAC as follows : </p>
                <ul>
                    <li><em>An identity has one or more roles.</em></li>
                    <li><em>a role requests access for authorization to a resource</em></li>
                    <li><em>an authorization is given to a role.</em></li>
                </ul>
                <p>This obviously according to the access policy (security rules) present on the platform.</p>
                <p>Below is an explanatory diagram of the access procedure : </p>
                <br>
                <p align="center">
                    <img  src="../../images/rbacdec.PNG" align="center" height="620"  width="1000" alt="RBAC Diagramme" title="RBAC Politique d'acces " /></p>
                <br>
                <p>The RBAC model, in its simplest or most complex form, allows, when it is understood and controlled,
                    <em><strong>to increase the operational performance of assigning rights</strong></em>
                    to users and thus brings <em><strong>a consequent reduction in the cost of identity management </strong></em> of the company.</p>
        <p><em>We will find the implementation on our platform IoT Smart Parking thanks to the section <em><strong><a href="rbac.php">Test</a> </strong></em></em></p>
                <br>
    </div>
</div>
</body>
</html>


