<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comparatives & Résults</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/resultats.css"><!-- Appel fichier abac.css pour mise en forme -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script><!-- Importation de la library SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <!-- Importation de la library Animate -->
</head>
<body>
<nav>
    <div class="topnav">   <!-- affichage de la barre de navigation -->
        <a class="headlogo"> <img height="50" width="50" src="../images/smart_parking.png" alt="logo"> </a>
        <a href="../../benchmark/php/homepage.php">Description</a>
        <a href="zend-rbac/description.php">RBAC</a>
        <a href="php-abac/description.php">ABAC</a>
        <a href="PerBAC/description.php">PerBAC</a>
        <a href="xacml-php/description.php">XACML</a>
        <a class="active" href="resultats.php">Comparatifs & Resultats</a>


        <div class="dropdown">
            <button class="dropbtn">Sign In/Sign Up
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="../../benchmark/php/index.php">Sign In</a>
                <a href="../../benchmark/php/enregistrement.php">Sign Up</a>
            </div>
        </div>
        <a href="../../benchmark/php/index.php" id="logout">Logout</a>
    </div>
</nav>

<div class="login-form">
    <form action="resultats.php" method="post">
             <h2 align="center"><a href="#compartifs-des-performances-des-differents-contrôles-daccès-"
                              id="compartifs-des-performances-des-differents-contrôles-daccès-">Comparisons of the
                performance of the various access controls : </a></h2>
        <p></p>
        <p></p>
        <h3><a href="#temps-de-réponse-" id="temps-de-réponse-">Response Time :</a></h3>
        <p><img src="../images/repon.JPG" alt="Temps Reponse AC" title="Temps de réponse des ACs " style="float: right;width: 500px;height: 350px ; margin-left: 30px;"/></p>
        <p>In general <em><strong>the response time</strong></em> is the time required for an action, following
            a stimulus is completed. </p>
            <p>In order to be able to give a value we have performed several times the execution of various queries in order to be able to give an average estimate of this response time and we have seen as presented on the graph that it is the model <strong><em>RBAC</em></strong> here that has the fastest time, this is explained by its role concept which wants to be a static model where the rules evolve very little. </p>
        <p>We also notice that it is the PerBac model given its flexibility and finally <strong><em> an improvement of the response time</em></strong> when implementing the XACML Language to the ABAC model since it allows to refine the access control policy</p>
        <br>
        <h3><a href="#table-de-test-" id="table-de-test-">Tests Tables :</a></h3>
        <p>We also find a comparative table of the different results obtained after various tests
            performed on the IOT platform.These various tests are the result of several experiments under various conditions in order to determine the general functioning of the access control models implemented.</p>
        <p>In particular, we have : </p>
        <ul>
<li><em>Response times obtained using a function from the time library indicating the time required for processing. </em>.</li>

<li><em>The test of availability checks of places and user rights implemented in real time</em>.</li>

<li><em>As well as various other elements such as scalability, usability, offloading etc... which are performance indicators remarks of the models according to the environmental conditions IoT<em>.</li>
</ul>
        <table align="center">
            <thead align="center">
            <tr>
                    <th style="text-align: center"> Test/Models</th>
                    <th style="text-align: center"> RBAC</th>
                    <th style="text-align: center">ABAC</th>
                    <th style="text-align: center"> PerBAC</th>
                    <th style="text-align: center"> XACML</th>
            </tr>
            </thead>
            <tbody align="center">
            <tr>
                <td><em><strong>Response time</strong></em></td>
                <td> 46 ms</td>
                <td >85 ms</td>
                <td>65 ms</td>
                <td>68 ms</td>
            </tr>
            <tr>
                <td><em><strong>Complexity</strong></em></em></td>
                <td> The simplest model of implementation and which has a good execution time since the verification
                    is quite lightweight compared to other models that
                    uses the concept of attributes.
                </td>
                <td> The semantic interpretation of attributes, their reliability, the definition of the
                    syntax for expressing attribute-based authorization requests and responses are
                    all the main reasons that make this model more complex.
                </td>
                <td> Quite complex model, since it is largely based on ABAC and uses mainly
                    the concept of several attributes and permissions, a great improvement in response time will be
                    possible thanks to offloading.
                </td>
                <td>Since it is used by ABAC for policy making, the formulation of the
                    request and its answers, as well as the maintenance of the architecture this language is based on XML, this
                    which greatly limits readability. XML is well known to be a very prolific language (too
                    This is why many users prefer to use the JSON format, which
                    provides better readability.
                </td>
            </tr>
            <tr>
                <td><em><strong>Scalability</strong></em></em></td>
                <td>Very critical since access policies cannot easily evolve.
                    effect the creation of new roles will lead to the complete reconstruction of the model.
                </td>
                <td> Has good scability. </td>
                <td> Good scalability offered thanks to the concept of abstract attributes ( manages a large
                    number of accesses according to the access policy).
                </td>
                <td>Contributes greatly to the scalability of the model by dynamizing the rules.
            </tr>
            <tr>
                <td><em><strong>Usability</strong></em></em></td>
                <td>This model has a fairly low level for this functionality since the rules remain very static given the characteristics of the model even if its implementation remains easy.</td>
                <td>ABAC has an average level of usability since it implements the XACML language, which is a rather complex language and requires a certain amount of adaptation time for the user.</td>
                <td>PerBAC has a higher level of usability than RBAC due to the implemented orBAC features that allow it to define a security policy regardless of its implementation. </td>
                <td>The usability of this language in its XML form is quite difficult and difficult at first, which is why many users are turning more to the JSON format. </td>
            </tr>
            <tr>
                <td><em><strong>User-focused services</strong></em></em></td>
                <td> there is no built-in functionality implementing this property. </td>
                <td>Although ABAC is considered complete and presents methods for describing specific rules using XACML, the structure of an XACML rule is complex. Indeed, the user is obliged to understand XACML
                    very well and write the verbose policy skillfully, which makes this model less user-centered. </td>
                <td>
                    PerBAC offers a good integration of this functionality since the access contract places the user at the center of the different activities. </td>
                <td>This type of language does not promote the concept of confidentiality since it does not support user interactions in a native way
                    while a user-centred privacy manager is required to involve the user in the policy development process. </td>
            </tr>
            <tr>
                <td><em><strong>A user trying to access a resource that does not belong to an existing role /
                            unknown</strong></em></em></td>
                <td>The RBAC is role-based. So a person trying to access a resource
                    without a role is immediately rejected.
                </td>
                <td> ABAC is an access control based on attributes and not on roles so the
                    decision will depend on the access control policy implemented.
                </td>
                <td> PerBAC being built on ABAC, it can manage the CA if the CA policy allows it.
                </td>
                <td> This user should of course be registered as the rightful owner in the
                    rule written according to this syntax to have access to this resource
                </td>
            </tr>
            <tr>
                <td><em><strong>Two guests trying to access the same resource at the same time</strong></em></em></td>
                <td>Two guests connecting at the same time cause a slight overload compared to a
                    only connection at a given time.
                </td>
                <td>The simultaneous access attempt gives the same result as with RBAC but consumes
                    more time since ABAC takes more into consideration more parameters compared to RBAC.
                </td>
                <td>PerBac also suffers from this problem because simultaneous access will cause a slight
                    overflow at the node where the code will be implemented. When this number exceeds two and reaches a very high
                    many of us will talk about a DOS (Denial of Service) attack.
                </td>
                <td> Very light support for functionality. </td>
            </tr>
            <tr>
                <td><em><strong>A user trying to access a space already reserved</strong></em></td>
                <td> Immediately rejected. </td>
                <td> Immediately rejected. </td>
                <td>A message will be sent to a guest trying to access a previously taken location in order to
                    recommend another place, either in the same parking lot or another secondary parking lot.
                </td>
                <td> Depending on the rules entered but generally unauthorized access for the purpose of
                    security.
                </td>
            </tr>
            <tr>
                <td><em><strong>Offloading</strong></em></em></td>
                <td>There is no built-in functionality implementing this property. </td>
                <td>There is no built-in functionality implementing this property. </td>
                <td> The server can manage multiple nodes due to its ability to outsource the
                    calculation to more powerful entities (central nodes, Cloud, Blockchain,...).
                </td>
                <td>There is no built-in functionality implementing this property. </td>
            </tr>
            <tr>
                <td><em><strong>Collaboration (when subject and resource belong to the same organization)</strong></em></em></td>
                <td>There is no built-in functionality implementing this property. </td>
                <td>There is no built-in functionality implementing this property. </td>
                <td>Since PerBAC is also based on attributes, the organization itself has
                    attributes, as well as resources as well. The most important attribute is the
                    The authorization will depend on the value of the latter, whether they are private or public.
                </td>
                <td>There is no built-in functionality implementing this property. </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>
