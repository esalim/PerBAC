<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XACML Control Access</title>
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
    <a  href="xacml.php"><i class="fa fa-fw fa-wrench"></i> Test</a>
</div>

<div class="content">
    <div class="login-form">
        <br>
        <h2 align="center"><a href="#standard-xacml-applied-to-the-access control model" id="standard-xacml-applied-to-the-access control model">XACML standard applied to the access control model</a></h2>
        <p><em><strong>XACML (eXtensible Access Control Markup Language)</strong></em> is an access control language based on XML standardized by <strong>OASIS (Organization for the Advancement of Structured Information Standards)</strong>
            which describes both an access control strategy language that is ABAC and an access control decision language (request / answer). </em></p>
        <p>This is a specification that defines the circulation of rules, the administration of the information systems security policy and
            which provides the authorization function in architectures <strong>SOA (Service Oriented Architecture)</strong></p>
        <p>XACML is mainly an access control based on system attributes <strong>(ABAC)</strong>,
            where the attributes (data bits) associated with a user or action or
            of a resource are involved in the decision to know if
            a given user can access a given resource in a particular way. </p>
        <p>Role-based access control <strong>(RBAC)</strong> can also be implemented in XACML as an ABAC specialization.</p>
        <p>XACML defines the following components:</p>
        <ul class="test">
            <li><em><strong>Policy Enforcement Point (PEP) : </strong></em> This is the point of application of the decision. It intercepts the user's request for access to a resource, makes a decision request to the PDP to obtain the access decision (access to the resource is approved or rejected) and acts on the decision received. the PEP protects the targeted application. </li>
            <li><em><strong>Policy Decision Point (PDP) : </strong></em> This is the policy decision point. The PDP is the driving force behind the architecture. This is where policies are evaluated and compared against authorization requests. </li>
            <li><em><strong>Policy Information Point (PIP) : </strong></em> The information point is the point where the PDP can connect to external sources of attributes such as LDAP or a database. The idea is that when evaluating a request against a policy, the PDP needs additional information (attributes) to obtain a decision. </li>
            <li><em><strong>Policy Retrieval Point (PRP) : </strong></em> This is the policy storage point. In short, the PRP is only a database or a place in a folder where policies are stored. </li>
            <li><em><strong>Policy Administration Point (PAP) : </strong></em> The policy administration point is where access control policies are published. </li>
        </ul>
        <p>The image below shows the XACML architecture and a sample authorization flow. </p>
        <p><img src="../../images/XACML.png" style="width : 600px ; height: 400px ; float: left ; margin-bottom: 10px ; margin-right: 65px"  alt="Standard XACML" title="XACML Flux d'autorisation" styl/></p>
        <ol style="line-height: 45px">
                <li>A user sends a request that is intercepted by the Enforcement Point (PEP) policy </li>
                <li>The PEP converts the request into an XACML</li> request for authorization
                <li>The PEP forwards the request for authorisation to the political decision point (PDP)</li>
                <li>The PDP evaluates the authorization request against the policies it is configured with. Policies are acquired by the recovery point policy (PRP) and managed by the administration point policy (PAP). If necessary, it also retrieves underlying policy information point (PIP) attribute values. </li>
                <li>The PDP makes a decision (permit / Refuse / Non-applicable / Indeterminate) and refers it to the PEP</li>
        </ol>
        <br>
        <p>For the implementation of the model within our platform <em><strong>IoT Smart Parking</strong></em> we used an online database (storage of available spaces) as well as <a href="https://github.com/enygma/xacmlphp"><em><code>OASIS/XACML Library</code></em></a>,
            a library implementing the OASIS / XACML standard for rule-based authorization.</p>
        <p>This is a well-defined XML structure for evaluating policy attributes based on subject attributes to determine if there is a match (based on operating rules and algorithm combinations). </p>
        More information from our model diagram : <p>
        <p><img src="../../images/xacmldec.png" alt="XACML" title="XACML Proceduire " style="float: left;width: 580px;height: 550px ; margin-bottom: 20px ; margin-right: 10px"/>
            <img src="../../images/xacml2.png" alt="XACML Diagramme" title="XACML Diagramme " style="float: right ; width: 480px;height: 550px;margin-bottom: 20px;margin-left: 10px"/></p>
        <br>
        <p>XACML in conjunction with ABAC is very <em><strong>flexible and offers a lot of possibilities</strong></em>
            since the performance of other models (RBAC, MAC...) can be greatly improved <em>. </em>
            It is a clear and useful architectural model <em><strong>model</strong></em> well beyond ABAC due to the syntax of this language and the related tools
            even if this language is not <em>very user-friendly and its power can be difficult to master</em>.</p>

        <p><em>We will find the implementation on our IoT Smart Parking platform thanks to the section <em><strong><a href="xacml.php">Test</a> </strong></em></em></p>
        <br>
    </div>
</div>

</body>
</html>

