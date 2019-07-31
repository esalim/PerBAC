<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> PerBAC Access Control </title>
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
        <a class="active" href="description.php">PerBAC</a>
        <a  href="../xacml-php/description.php">XACML</a>
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
    <a class="active"  href="description.php" ><i class="fa fa-fw fa-newspaper-o"></i> Description</a>
    <a  href="perbac.php"><i class="fa fa-fw fa-wrench"></i> Test</a>
</div>

<div class="content">
    <div class="login-form">
               <br>
        <h2 align="center"><a href="#modèle-pervasive-base-access-control-perbac" id="modèle-pervasive-base-access-control-perbac">Pervasive Base Access Control (PerBAC) Model</a></h2>
        <p>Given the limitations of popular access control models that have been widely adopted in IoT environments,
            and especially the importance of access control models in such environments, there is a serious need for an IoT adapted solution.</p>
        <p><em><strong>PerBAC (Pervasive Base Access Control)</strong></em> is essentially based on <strong>ABAC</strong>.</p>
        <p>In the sense that it uses the concept of attributes</em>, which is very advantageous in decentralized IoT environments, and also includes several <em>abstract concepts</em> and other generic AC models such as <strong>RBAC or OrBAC</strong>.</p>
        <p>We enrich ABAC not only with additional <em>features from OrBAC and its extensions</em>, but also with <em>an original security approach</em> that meets the basic IoT requirements.</p>
        <p>This presents a proactive approach, allowing smart use of well-known attributes and abstract entities.
        <p><img src="../../images/per1.png" alt="Entités PerBAC" title="Les Entités du modèle PerBAC " style="float: right;"/></p>
        <p style="float: left">PerBAC model, since it has OrBAC features, characterizes all its entities by attributes
            which are the characteristics of the subject, object, action or under environmental conditions. </p>
        <p>It also find adds concept of abstract attributes.</p>
        <p>The attributes of the abstract layer are considered logical / abstract attributes with many conditions,
            while the attributes of the physical layer are called physical attributes. </p>
        <p>The mapping concept in PerBAC
            is relatively simple: if the attributes of a concrete entity (subject, object or action) characterize the corresponding abstract entity (role, view or activity, respectively),
            then the first one is automatically connected to it. </p>
        <p>The decision to authorize or deny access to a subject for a requested resource (object) is made according to the illustrative figure below
        <p><img src="../../images/per2.png" alt="Processus decision PerBAC" title="Processus de decision PerBAC" style="float: left; margin-right: 20px;width: 780px"/></p>
        <ol>
            <li>
                <p>The object <em>s</em> first sends a request <strong>REQ (org, s, o, a)</strong> to an object <em>o</em> in order to perform an action <em>a</em>.
                    This request from the organization <em>org</em> contains the requested resource, subject, object and action specifications. </p>
            </li>
            <li>
                <p>The request is received by the <strong>PEP</strong> and then redirected to the <strong>PDP</strong> after extracting some global attributes
                    also referred to as environmental attributes <em>(att)</em> . <strong>PDP</strong> sends a request to <strong>PIP</strong> for entity attributes
                    that he just received.
                    Once these ones are obtained, the request will be forwarded to the <em>correspondence function
                        to concatenate</em> concrete and abstract entities. </p>
            </li>
            <li>
                <p>Now that all necessary information on all stakeholders has been collected,
                    the <strong>PDP</strong> seeks the <em>AC</em>policy of the organization and makes the right decision</em> on the basis of the processed information.
                    This decision is then sent to the <strong>PEP</strong>, which informs the requesting subject.</p>
            </li>
        </ol>
        <p>Most of the time, central nodes play the role of PEP for their end nodes,
            At the less constrained layer, the computation/offloading layer will have a cloud component or a dedicated server.
            This component fulfills the roles of PDP / PIP / PAP and can speed up the decision-making process. </p>
        <p>For the implementation of the model within our platform <em><strong>IoT Smart Parking</strong></em> we followed the following diagrams : </p>
        <p>Our intelligent car park with a large number of parking spaces has only one entrance and one exit. In addition,
            parking spaces are divided into several domains or zones, each of which is managed by a central node. </p>
        <p>We will consider two zones: <em><strong>a Standard Zone</strong></em> which is accessible to all (public) within the framework of a public contract, and a <em><strong>Privileged Access Zone</strong></em> .</p>
        <p>Access to the zones is identified by a Badge <strong>Red</strong> or <strong>Blue</strong>.</p>
        <p>For <em><strong>the Identification process</strong></em> when requesting a parking space, a vehicle is identified by its plate,
            and the user must then present an identification badge. </p>
            <For <em><strong>the node selection process</strong></em> after presentation of the user's badge the algorithm will have to select the appropriate central node to process the incoming request.
            depending on the color of the badge, one of the central nodes will process the request. </p>
        <p>This will be the standard central node (CN_STANDARD) for the <strong>Blue Badge</strong></em> or the preferred central node (CN_STANDARD) for the <strong>Red Badge</strong></em></p>
        <p>For <em><strong>the access control process</strong></em> after selecting the appropriate central node, the algorithm starts the decision making process to determine access to the resource (parking space).</p>
        <p>Below are the explanatory UML sequence diagrams</strong></em> of the <em><strong>selection process of a central node (first)</strong></em> as well as the access control (second)</strong><strong> access control (second)</strong></em>.</p>
        <p align="center"><img src="../../images/per3.png" alt="Choix Noeud PerBAC" title="Choix Noeud PerBAC" /></p>
        <p align="center"><img src="../../images/per4.png" alt="Controle d'accès PerBAC" title="Controle d'acces PerBAC" /></p>
        <p><em>We will find the implementation on our IoT Smart Parking platform thanks to the section <em><strong><a href="perbac.php">Test</a> </strong></em></em></p>
        <p>A <em>video test</em> access control is also implemented using <strong>JAVA language</strong> and the use of <strong>JSON files</strong> is also found in the section <em><strong>Test-Video</strong></em></p>
        <br>
    </div>
</div>

</body>
</html>


