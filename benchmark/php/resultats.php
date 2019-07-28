<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comparatifs & Résultats</title>
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
        <a href="../../php/homepage.php">Description</a>
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
                <a href="../../php/index.php">Sign In</a>
                <a href="../../php/enregistrement.php">Sign Up</a>
            </div>
        </div>
        <a href="../../php/index.php" id="logout">Sortir</a>
    </div>
</nav>

<div class="login-form">
    <form action="resultats.php" method="post">
        <h2 align="center"><a href="#compartifs-des-performances-des-differents-contrôles-daccès-"
                              id="compartifs-des-performances-des-differents-contrôles-daccès-">Comparatifs des
                performances des différents contrôles d'accès :</a></h2>
        <p>La protection des données et de la <em><strong>vie privée</strong></em> des personnes est devenue aujourd’hui
            un <em>enjeu majeur</em> pour les entreprises et les organisations gouvernementales qui collectent
            et entreposent les données à caractère personnel.L’adoption <em><strong>d’une politique de sécurité</strong></em> est donc impératif , raison pour laquelle
            nous avons implémenter divers modèles de contrôle d’accès au sein de notre plate-forme IoT afin de fournir
            une sécurité optimale.</p>
        <p>Cependant chacun de ces modèles présente des <em><strong>forces et des faiblesses</strong></em> , il convient
            donc mieux connaître les modèles de contrôles d’accès avant
            de les implémenter.</p>
        <p>Ainsi nous allons donc dégager <em><strong>les principaux éléments qui caractérisent nos contrôles
                    implémentés ainsi que quelques critères susceptibles de nous aider à opter pour un contrôle d'accès
                    en particulier</strong></em>.</p>
        <h3><a href="#temps-de-réponse-" id="temps-de-réponse-">Temps de réponse :</a></h3>
        <p><img src="../images/repon.PNG" alt="Temps Reponse AC" title="Temps de réponse des ACs " style="float: right;width: 500px;height: 350px ; margin-left: 30px;"/></p>
        <br>
        <p>En général <em><strong>le temps de réponse</strong></em> est le temps nécessaire pour qu'une action, suite à
            un stimulus, soit achevée.</p>
        <p>Nous constatons qu'a partir de notre graphe que c'est le modèle <strong><em>RBAC</em></strong> ici qui dispose du temps le plus rapide , cela s'explique par son concept de role qui se veut etre un modèle statique ou les règles évoluent très peu. </p>
        <p>On remarque également <strong><em>une amélioration du temps de réponse</em></strong> offert par l'implémentation du Langage XACML puisque celle ci permet d'affiner la politique de contrôle d'accès</p>
        <br>
        <br>
        <br>
        <br>
        <h3><a href="#complexité-" id="complexité-">Complexité :</a></h3>
        <p><img src="../images/complex.png" alt="Complexité AC" title="Complexité des ACs " style="float: left;width: 500px;height: 500px ; margin-right: 50px;"/></p>
        <br>
        <br>
        <br>
        <br>
        <p ><em><strong>La complexité</strong></em> désigne le caractère d'un système, un état formé a la suite de
            nombreux éléments, qui est difficile à percevoir.</p>
        <p>Sur le graphe suivant nous constatons que c'est le modele <strong>RBAC</strong>
            qui présente <em>la plus faible complexité</em> puisqu'il ne fait appel aux concepts d'attributs et
            n'utilise pas un langage à syntaxe compliquée.</p>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p align="center">Ci dessous un histogramme comparatif selon divers critères concernant les différents contrôles d'accès
            existants :</p>
        <p align="center"><img src="../images/eval.png" alt="Evaluation des critères des ACs existants"
                title="*Evaluation des Critères des ACs existants "/></p>
        <p><em><strong>Note :</strong></em></p>
        <pre><code>* La scalabilité désigne la capacité à maintenir ses fonctionnalités et ses performances même en cas de forte demande.

* La granularité définit le niveau de détail (grain) de l’information présentée. Dans notre cas plus la grammaire de la police d'accès aux ressource est souple plus precis sera le contrôle d'acces.

* La délégation représente la faculté d'un sujet à pouvoir accorder des droits d'accès ou une partie des droits à un autre sujet.

* L'interopérabilité est la capacité que possède un produit ou un système, à fonctionner avec d’autres produits ou systèmes existants ou futurs et ce sans restriction d’accès ou de mise en œuvre.

* L'utilisabilité fait parti du terme plus général «expérience utilisateur» et fait référence à la facilité d'accès et / ou d'utilisation d'une ressource.

* Les services axés sur l'utilisateur représente l'ensemble des activités ou une certaine responsabilité est accorder à l’utilisateur.

 Il doit être placé au centre du système, en tant que point d'intégration , de création et de contrôle.
            </code></pre>
        <p>Nous retrouvons même également un tableau comparatif des différents résultats obtenus après divers tests
            effectués sur la plate-forme IOT :</p>
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
                <td><em><strong>Temps de réponse</strong></em></td>
                <td> 46 ms</td>
                <td >85 ms</td>
                <td>65 ms</td>
                <td>68 ms</td>
            </tr>
            <tr>
                <td><em><strong>Complexité</strong></em></td>
                <td> Modèle le plus simple d'implementation et qui présente une bon temps d'execution puisque la vérification
                    est assez allégée par rapport aux autres modèle qui
                    utilise la concept d'attributs.
                </td>
                <td> L'interprétation sémantique des attributs, leur fiabilité , la définition de la
                    syntaxe pour l'expression des demandes d'autorisations basées sur les attributs et des réponses sont
                    toutes les principales raisons qui rende ce modèle plus complexe.
                </td>
                <td> Modèle assez complexe , puisque basée en grande partie sur ABAC et utilisant surtout
                    le concept de plusieurs attributs et permissions.Une grande amélioration du temps de réponse sera
                    possible grace au l'offloading.
                </td>
                <td> Puisqu'il utilisé par ABAC pour la définition des politiques, la formulation de la
                    demande et ses réponses , ainsi que la maintenance de l'architecture ce langage est basé sur XML, ce
                    qui limite beaucoup la lisibilité. XML est bien connu pour être un langage très prolixe (trop
                    long/bavard).Raison pour laquelle de nombreux utilisateurs préfèrent utiliser le format JSON qui
                    offre une meilleure lisibilité.
                </td>
            </tr>
            <tr>
                <td><em><strong>Scalabilité</strong></em></td>
                <td> Très critique puisque les politiques d'acces ne peuvent pas évoluer facilement.En
                    effet la création de nouveaux rôles entraînera la reconstruction entière du modèle.
                </td>
                <td> Dispose d'une bonne scabilité.</td>
                <td> Bonne scalabilité offerte grace au concept d'attributs abstraits ( gère un grand
                    nombre d'accès selon la politique d'acces).
                </td>
                <td> Contribue grandement à là scalabilité du modèle en dynamisant les règles.</td>
            </tr>
            <tr>
                <td><em><strong>Utilisabilité</strong></em></td>
                <td> Ce modèle présente un niveau assez bas pour cette fonctionnalité puisque les règles restent très statiques étant donnée les caractéristiques du modèle même si son implémentation reste facile.</td>
                <td> ABAC présente un niveau moyen d'utilisabilité puisque qu'elle implémente le langage XACML qui est un langage assez complexe et nécessite un certains temps d'adaptation pour l'utilisateur.</td>
                <td> PerBAC présente un niveau d'utilisabilité plus élevé que celui de RBAC grace aux fonctionnalités de l'orBAC implémentées qui lui permettent de définir une politique de sécurité indépendamment de son implémentation.</td>
                <td> L'utilisabilité de ce langage dans sa forme XML est assez hardu et difficile dans un premier temps , raison pour laquelle de nombreux utilisateurs se tournent plus vers le format JSON.</td>
            </tr>
            <tr>
                <td><em><strong>Services axés sur utilisateur</strong></em></td>
                <td> il n'y a pas de fonctionnalité intégrée implémentant cette propriété.</td>
                <td> Bien que ABAC soit considéré comme complet et qu'il présente des méthodes de description des règles précises grace à XACML, la structure d’une règle XACML est complexe. En effet, l'utilisateur est obligé de comprendre XACML
                    très bien et d'écrire la politique verbeuse habilement , ce qui rend ce modèle peu centrée sur l'utilisateur.</td>
                <td>
                    PerBAC offre une bonne intégration de cette fonctionnalité puisque le contrat d'accès place l'utilisateur au centre des différentes activités.</td>
                <td> Ce type de langage ne favorise pas le concept de confidentialité puisqu'il ne prend pas en charge les interactions avec l'utilisateur de manière native
                    alors qu'un gestionnaire de la confidentialité axé sur l'utilisateur est nécessaire pour impliquer l'utilisateur dans le processus de définition de la politique.</td>
            </tr>
            <tr>
                <td><em><strong>Un utilisateur essayant d'accéder à un ressource n'appartenant pas à un rôle existant /
                            inconnu</strong></em></td>
                <td> Le RBAC est basé sur les rôles. Donc une personne qui tente d'accéder à un ressource
                    sans rôle est immédiatement rejeté.
                </td>
                <td> ABAC est un contrôle d’accès basé sur attributs et non sur les rôles alors la
                    décision dépendra de la politique de contrôle d'accès mise en œuvre.
                </td>
                <td> PerBAC étant construit sur ABAC, il peut gérer le AC si la politique AC le permet.
                </td>
                <td> Ce utilisateur devrait etre bien sur inscrit comme ayant droit dans le fichier de
                    règle écrit selon cette syntaxe pour disposer de l'accès à cette ressource
                </td>
            </tr>
            <tr>
                <td><em><strong>Deux invités tentant d'acceder à la même ressource et au même moment</strong></em></td>
                <td>Deux invités se connectant au même temps causer une légère surcharge comparé à une
                    seule connexion à un moment donné.
                </td>
                <td> La tentative d'accès simultané donne le même résultat qu'avec RBAC mais consomme
                    plus de temps puisque ABAC prend plus en considération plus de paramètres comparés à RBAC.
                </td>
                <td> PerBac souffre aussi de ce problème parce que l'accès simultané causera une léger
                    débordement au noeud où le code sera mis en œuvre. Quand ce nombre dépasse deux et atteint un très
                    grand nombre nous allons parler d'attaque DOS (Déni de Service).
                </td>
                <td> Support très léger de la fonctionnalité.</td>
            </tr>
            <tr>
                <td><em><strong>Un utilisateur essayant d'acceder à une place déjà réservée</strong></em></td>
                <td> Immédiatement rejeté.</td>
                <td> Immédiatement rejeté.</td>
                <td> Un message sera envoyé à un invité tentant d'accéder à un endroit déjà pris afin de
                    lui recommander un autre endroit, soit dans le même parking ou un autre parking annexe.
                </td>
                <td> En fonction des règles inscrites mais en général accès non autorisé pour mesure de
                    sécurité.
                </td>
            </tr>
            <tr>
                <td><em><strong>Offloading</strong></em></td>
                <td> Il n'y a pas de fonctionnalité intégrée mettant en œuvre cette propriété.</td>
                <td> Il n'y a pas de fonctionnalité intégrée mettant en œuvre cette propriété.</td>
                <td> Le serveur peut gérer plusieurs nœuds en raison de sa capacité à externalizer le
                    calcul vers des entités plus puissantes (nœuds centraux,Cloud, Blockchain,…).
                </td>
                <td> Il n'y a pas de fonctionnalité intégrée mettant en œuvre cette propriété.</td>
            </tr>
            <tr>
                <td><em><strong>Collaboration (quand le sujet et la ressource appartiennent à la même organisation)</strong></em></td>
                <td> Il n'y a pas de fonctionnalité intégrée mettant en œuvre cette propriété.</td>
                <td> Il n'y a pas de fonctionnalité intégrée mettant en œuvre cette propriété.</td>
                <td> PerBAC étant également basé sur les attributs , l'organisation elle-même possède des
                    attributs, ainsi que les ressources elles aussi. Le plus important attribut est le
                    contrat.L'autorisation dépendra de la valeur de ces derniers, qu'ils soient privés ou publics.
                </td>
                <td> Il n'y a pas de fonctionnalité intégrée mettant en œuvre cette propriété.</td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>
