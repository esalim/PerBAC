# PerBAC
Pervasive Based Access Control Model

 Introduction 
------------
Cette bibiotheque permet une implementation pratique du modele d'acces **PerBAC**.

Nous choisissons de construire notre modèle basé principalement sur ABAC comme un modèle global AC standard  qui, d'une part utilise le concept d'attributs très avantageux dans les environnements décentralisés IoT, et d'autre part inclut plusieurs concepts abstraits et autres modèles AC génériques tels que RBAC. 

Pour implémenter le modèle PerBAC, nous devons définir les exigences d'un environnement IoT standard en matière de contrôle d'accès. Il est clair qu'un environnement IoT pourrait avoir des exigences différentes changeant d'un contexte à l'autre. Cependant, sans certaines exigences globales qui entourent les situations IoT standard, nous ne pouvons pas définir un modèle CA qui les traitera avec efficacité.


Fonctionnnement
---------------

Nous pouvons supposer que les attributs globaux seront collectés par le nœud central dans une architecture hybride précédemment citée.

Perbac se base sur 3 entites a savoir :

`Policy Information Point`

`Policy Access Point`

`Policy Decision Point`

**Policy Information Point**

PIP(Policy Information Point) comme son nom l'indique est en rapport avec les infos.En effet c'est l'entite qui  est charge d'extraire des infos supplementaires sur le User dans la base de donnees. le fichier **JSONattributs.json** contient les infos sur chaque User du parking.l'extraction des infos supplementaires permettra un meilleur controle

**Policy Access Point**

Entite qui permet la gestion des politiques d'acces aux ressources demandees.Les Permissions sont dans le fichier **JSONPermission.json** .

**Policy Decision Point**

PDP(Policy Decision Point) joue le role du maestro dans un orchestre. En effet c'est l'entite qui coordonne toutes  ces connexions.Elle recoit les donnees du noeud central et envoie une requete au PIP a fin d'extraire les informations supplementaires du USER. PDP enverra une requete au PAP pour la verification de la permission. 





Prérequis 
-----------
Installer java-JDK :

`sudo apt-get install openjdk-7-jdk`

Cloner PerBAC :

`git clone https://github.com/esalim/PerBAC.git`

Telecharger la bibiotheque JSON :

`https://jar-download.com/artifacts/org.json`

Importer la bibliotheque:

`javac -cp json-20180813.jar yourfilename.java `.


Exemple
-------
Nous avons dans cet exemple une verification de controle d'acces par le modele PerBAC.

 Un user possede des cacteristiques(attributs) et veut acceder a une ressource pour effectuer une tache bien definie.
 
 Par exemple ,nous pouvons avoir le code suivant :
 

    public static void main(String[] args) throws Exception {
       Organisation org = new Organisation("21Street",50,"militaire");
        Subject sub=new Subject("Mamadou","comptable",18);
        Ressource re=new Ressource(("repertoire"));
        Action ac =new Action("lire");
        Requester req = new Requester(org,sub);
        ParkingPlace par=new ParkingPlace(re,ac);
    PolicyDecisionPoint pdp=new PolicyDecisionPoint(req,par);
            pdp.validation();
    }


 
**JSONPermisson.json**

fichier contenant la politique d'acces du Modele:

`{
"orgaizationname":"21Street",
"subjectname":"Mamadou",
"subjectposte":"comptable",
"objectename":"repertoire"
"actiontype":"lire",
"comportement":"bon",
"autorisation":"accepte"
}`

l'attribution de la permission ne dependra pas seulement des attributs  du USER .Elle dependra aussi du comportement du User dans le parking lors d'une visite.


Collaboration
-------------




L'atout principal du model **Perbac** est de premettre la realisation de la decentralisation du controle tout en restant efficace comme ABAC et RBAC. La classe  **AvailibilityManager** permet de controler la disponibilite des places du parking au cas ou il y a aura une demande.Elle envoie cet etat a un serveur qui stockera la donnees dans un fichier **serveurParking.txt**. Ainsi tous noeuds souhaitant connaitre l'etat du parking se conectera au serveur.

Comme exemple, nous pouvons avoir le code suivant :


**Client**



public void makeAvailibility()
            {

                Socket socket;
                PrintWriter out;

                try {
                    socket = new Socket("192.168.1.161",2009);
                     out = new PrintWriter(socket.getOutputStream());
                    out.println(this.makeFree());
                    out.flush();
                    socket.close();


                }catch (UnknownHostException e) {

                    e.printStackTrace();
                }catch (IOException e) {

                    e.printStackTrace();
                }
            }

`192.168.1.161` répresente l'addresse IP du serveur(noeud central ) sur le reseau local.


**Serveur**

Installer un serveur:

`sudo apt-get install apache2`



Creer un repertoire dans le dossier '/var/www/html/' .Copie et colle le code suivant dans un fichier.java dans le repertoire que vous avez cree 




  public static void main(String[] args) {
  
		ServerSocket socketserver ;
		Socket socketduserveur ;
		BufferedReader in;
		PrintWriter out;
		try {
			socketserver = new ServerSocket(2009);
			socketduserveur = socketserver.accept();

			in = new BufferedReader (new InputStreamReader (socketduserveur.getInputStream()));
		        String message_distant = in.readLine();
			BufferedWriter sortie = new BufferedWriter(new FileWriter("serveurparking.txt",true));
			sortie.newLine();
			sortie.write(message_distant);
		        System.out.println(message_distant);
			sortie.close();
		        socketserver.close();
		        socketduserveur.close();
		}catch (IOException e) {
			e.printStackTrace();
	}}



