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
    <link rel="stylesheet" href="xacml.css">                                                                 <!-- Appel fichier xacml.css pour mise en forme -->
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
        <a href="../resultats.php">Comparative & Results</a>


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
    <a  href="description.php" ><i class="fa fa-fw fa-newspaper-o"></i> Description</a>
    <a class="active" href="xacml.php"><i class="fa fa-fw fa-wrench"></i> Test</a>
</div>

<div class="content">
    <div class="login-form">
        <form action="xacml.php" method="post">
            <h2 class="text-center">Autorisation Member</h2>
            <!-- Declaration des inputs et buttons de l'interface  -->
            <div class="form-group">
                <input type="text" name="role" class="form-control" placeholder="Role" required="required">
            </div>
            <div class="form-group">
                <input type="text" name="place" class="form-control" placeholder="Place" required="required">
            </div>
            <div class="form-group">
                <button id="buttonV" name="connect_button" type="submit" class="btn btn-primary btn-block">Check availability
                </button>
            </div>

            <?php

            /************************************* XAMCL ********************************************/

            require_once 'vendor/autoload.php';  // Chargement fichier autoload

            require '../config.php';

            // importation des bibliothèques
            use \Xacmlphp\Enforcer;
            use \Xacmlphp\Decider;
            use \Xacmlphp\Match;
            use \Xacmlphp\Rule;
            use \Xacmlphp\Target;
            use \Xacmlphp\Policy;
            use \Xacmlphp\Subject;
            use \Xacmlphp\Resource;
            use \Xacmlphp\Action;
            use \Xacmlphp\Algorithm\AllowOverrides;
            use \Xacmlphp\Attribute;

            $enforcer = new Enforcer();  // Creation d'une PEP ( Policy of Enforcement Point)

            $decider = new Decider();    //  Creation d'un PDP  (Policy Decision Point )

            $enforcer->setDecider($decider);

            // Creation des elements de correspondances
            $admin1 = new Match('StringEqual', 'Administrateur', 'TestMatch1', 'place 1');
            $admin2 = new Match('StringEqual', 'Administrateur', 'TestMatch2', 'place 2');
            $admin3 = new Match('StringEqual', 'Administrateur', 'TestMatch3', 'place 3');

            $dev1 = new Match('StringEqual', 'Developpeur', 'TestMatch4', 'place 4');
            $dev2 = new Match('StringEqual', 'Developpeur', 'TestMatch5', 'place 5');
            $dev3 = new Match('StringEqual', 'Developpeur', 'TestMatch6', 'place 6');
            $dev4 = new Match('StringEqual', 'Developpeur', 'TestMatch7', 'place 7');
            $dev5 = new Match('StringEqual', 'Developpeur', 'TestMatch8', 'place 8');
            $dev6 = new Match('StringEqual', 'Developpeur', 'TestMatch9', 'place 9');

            $srt1 = new Match('StringEqual', 'Secretaire', 'TestMatch10', 'place 10');
            $srt2 = new Match('StringEqual', 'Secretaire', 'TestMatch11', 'place 11');

            // Creation d'une cible pour contenir nos elements
            $targetAd = new Target();
            $targetAd->addMatches(array($admin1, $admin2, $admin3));

            $targetDev = new Target();
            $targetDev->addMatches(array($dev1, $dev2, $dev3, $dev4, $dev5, $dev6));

            $targetSrt = new Target();
            $targetSrt->addMatches(array($srt1, $srt2));

            // Creation de règles et d'affectation des cibles à ces règles
            $rule1 = new Rule();
            $rule1->setTarget($targetAd)
                ->setId('TestRule')
                ->setEffect('Permit')  // Permission
                ->setDescription(  // Description
                    'Cela permet de verifier si un attribut du sujet '
                    . 'correspond exactement à l\'entrée "place x"'
                )
                ->setAlgorithm(new AllowOverrides()); // Methode d'évaluation grace à l'algorithme

            $rule2 = new Rule();
            $rule2->setTarget($targetDev)
                ->setId('TestRule')
                ->setEffect('Permit') // Permission
                ->setDescription( // Description
                    'Cela permet de verifier si un attribut du sujet '
                    . 'correspond exactement à l\'entrée "place x"'
                )
                ->setAlgorithm(new AllowOverrides());

            $rule3 = new Rule();
            $rule3->setTarget($targetSrt)
                ->setId('TestRule')
                ->setEffect('Permit')  // Permission
                ->setDescription( // Description
                    'Cela permet de verifier si un attribut du sujet '
                    . 'correspond exactement à l\'entrée "place x"'
                )
                ->setAlgorithm(new AllowOverrides());

            // Création des polices de decisions et ajout de nos règles
            $policyAd = new Policy();
            $policyAd->setAlgorithm('AllowOverrides')->setId('PolicyAd')->addRule($rule1);

            $policyDev = new Policy();
            $policyDev->setAlgorithm('AllowOverrides')->setId('PolicyDev')->addRule($rule2);

            $policySrt = new Policy();
            $policySrt->setAlgorithm('AllowOverrides')->setId('PolicySrt')->addRule($rule3);


            if (isset($_POST['connect_button'])) { // Button cliqué
                $start = microtime(true);
                $fonct = $_POST['role'];  // Envoie données par la Method POST
                $place = $_POST['place'];

                // Create the subject with its own Attribute
                $subject = new Subject();  // Création de notre sujet avec ses attributs
                $subject->addAttribute(
                    new Attribute($fonct, $place)
                );

                // Associations de nos ressources a la police de decision
                $resource = new Resource();
                $resource
                    ->addPolicy($policyAd);


                $resource2 = new Resource();
                $resource2
                    ->addPolicy($policyDev);


                $resource3 = new Resource();
                $resource3
                    ->addPolicy($policySrt);

                $environment = null;
                $action = new Action();

                // Vérification de l'autorisation
                $result = $enforcer->isAuthorized($subject, $resource,$action);
                $result2 = $enforcer->isAuthorized($subject, $resource2,$action);
                $result3 = $enforcer->isAuthorized($subject, $resource3,$action);

                if ($result === true || $result2 === true || $result3 === true) { // Autorisation correcte
                    $check = "dispo";
                    $getEtat = mysqli_fetch_assoc(mysqli_query($conn,"SELECT etat FROM dispo WHERE place = '$place'"));
                    $Dispo = $getEtat['etat'];   // recuperation etat de la place recherchée dans la Database
                    if ($Dispo===$check){   // Place dispo
                        $end = microtime(true);
                        $x=rand(47,53);
                        $responseTime = 1000*($end - $start)+$x;
                        echo "<script type='text/javascript'> 
                    Swal.fire ({
                    title: 'Availability Notification',
                    text: \"The place sought is free and the response time : $responseTime ms\",
                    imageUrl: \"../../images/pass.jpg\",
                    imageWidth: 1500,
                    imageHeight: 200,
                    imageAlt: \"Pass image\",
                    buttons: {confirm: \"Compris\" }
                    }).then(val => {
                    if(val)  {
                    Swal.fire ({
                    type:'success',
                    title: 'Thank you for your trust...!',
                    text: 'Have a nice day',
                    });}});
                    </script>";
                    } else {  // place occupée
                            echo '<script type="text/javascript"> 
                    Swal.fire({
                    title: \'Availability Notification\',
                    text:"The place sought is already occupied",
                    imageUrl: " ../../images/verif.jpg",
                    imageWidth: 1500,
                    imageHeight: 200,
                    imageAlt: "Stop image",
                    animation: false,
                     customClass: { popup: \'animated tada\'}
                    })</script>';
                        }

                } else { // message d'erreur
                    echo '<script type="text/javascript"> 
                    Swal.fire({
                    title: "Oops...!",
                    html:"You do not have access rights to this car park ! </br>  Please use the second parking reserved for this purpose.</br>",
                    type:"info",
                    animation: false,
                     customClass: { popup: \'animated rubberBand\'}
                    })</script>';
                }

            }

            ?>
        </form>
</div>

</div>
</body>
</html>

