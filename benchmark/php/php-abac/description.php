<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ABAC Access Control</title>
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
    <a class="active" href="description.php" ><i class="fa fa-fw fa-newspaper-o"></i> Description</a>
    <a href="abac.php"><i class="fa fa-fw fa-wrench"></i> Test</a>
</div>

<!-- Page content -->
<div class="content">
    <div class="login-form">
       <br>
        <h2 align="center"><a href="#modèle-attribute-based-access-control-abac" id="modèle-attribute-based-access-control-abac">Attribute Based Access Control (ABAC) Model</a></h2>
        <p>Attribute-Based Access Control (ABAC) 
        defines a model in which access rights are granted to users through 
        the use of policies that combine the attributes together.</p>
        <p>This is where you can <em><strong>dynamically evaluate</strong></em> digital security policies against <em><strong>relevant attribute values</strong></em> and determine whether a user's access request will <em><strong>be allowed or not</strong></em>.</p>
        <p>Unlike role-based access control (RBAC), ABAC is mainly based on the concept of policies that express <em><strong>a complex set of boolean rules</strong></em>
        evaluating many different attributes.</p>
        <p> ABAC operates according to the following architecture:</p>
        <ol>
            <li>
                <p><em><strong> PEP or Policy Enforcement Point :</strong></em> It is responsible for protecting the data and applications on which ABAC is to be applied. The PEP inspects the request and then generates an authorization 
                request that will be sent to the PDP. The PDP or policy decision point is the brain of the architecture. This is the part that evaluates 
                incoming requests against the policies that it has been configured with. The PDP returns a Permit / Deny decision.</p>
            </li>
            <li>
                <p><em><strong>Attributes :</strong></em> can be of any type and belong to everyone. There are generally four (4) main types :</p>
            </li>
        </ol>
        <ul>
            <br>
            <li><strong>Subject attributes</strong> that describe the user E.g age </li>
            <br>
            <li><strong>Action attributes</strong> that describe the attempted action of : read, delete, view, approve, etc ...</li>
            <br>
            <li><strong> Objets attributes</strong> that describe the object (or resource) ; for example the type of object (medical file, account banking ...), department, classification or sensitivity, location ...</li>
            <br>
            <li><strong> Contextual (environmental) attributes</strong> that deal with the time, place, or dynamic aspects of the access control scenario.</li>
        <br>
        </ul>
        <ol start="3">
            <li><em><strong>Policies :</strong></em> are statements that bring the attributes together to express what can happen and is not allowed.</li>
        </ol>
        <p>  We find below an illustrative figure of the model :</p>
        <br>
        <p align="center"><img src="../../images/authorizationdiagram.png" height="420"  width="820" alt="ABAC Modèle" title="ABAC Modèle d'acces " /></p>
        <br>
        <p>As shown in the figure above, requests are intercepted by the (PEP) and redirected 
        to the (PDP). The requests will
         be evaluated in real time, following a policy of rules that support the Boolean logic, 
         in which the rules contain "If, then" loops about the subject, the resource, and the action.</p>
        <p>As an implementation of the model in our <em><strong>IoT Smart Parking</strong></em> we used an online database (storage of available seats) and <a href="https://docs.zendframework.com/zend-permissions-rbac/intro/"><em><code>Casbin(PHP)</code></em></a> ,
        a powerful and efficient open source access control library running following a <em><strong>.conf</strong></em> file containing all of our rules and a <em><strong>.csv</strong></em> file (attributes database) that will do will be compared to data from the database in lineages.</p>
        <p> More information from diagram of our model :</p>
        <br>
        <p align="center"><img src="../../images/abacdec.PNG" height="620"  width="920" alt="ABAC Diagramme" title="ABAC Politique d'acces " /></p>
        <br>
        <p>ABAC is considered a "next generation" model because its
            <em><strong> dynamic, contextual and risk-based approach.</strong></em>Smart access control 
            to resources to define access control policies that include attributes 
            specific to many different information systems <em><strong>to resolve and ensure effective regulatory compliance</strong></em>,
            as well as enable businesses to to be flexible in their implementation based on their existing infrastructure.</p>
            <p><em>We will find the implementation on our Smart Parking platform in the section <em><strong><a href="abac.php">Test</a> </strong></em></em></em></p>
<br>
    </div>
</div>

</body>
</html>



