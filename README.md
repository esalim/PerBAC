# PerBAC
Pervasive Based Access Control Model

 Introduction 
------------
Cette bibiotheque permet une implementation pratique du modele d'acces **PerBAC**.

Nous choisissons de construire notre modèle basé principalement sur ABAC comme un modèle global AC standard  qui, d'une part utilise le concept d'attributs très avantageux dans les environnements décentralisés IoT, et d'autre part inclut plusieurs concepts abstraits et autres modèles AC génériques tels que RBAC. 

Pour implémenter le modèle PerBAC, nous devons définir les exigences d'un environnement IoT standard en matière de contrôle d'accès. Il est clair qu'un environnement IoT pourrait avoir des exigences différentes changeant d'un contexte à l'autre. Cependant, sans certaines exigences globales qui entourent les situations IoT standard, nous ne pouvons pas définir un modèle CA qui les traitera avec efficacité.




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
    Scanner sc=new Scanner(System.in);
        System.out.println("---------ORGANISATION----------");
        System.out.println("Nom :");
        String name =sc.nextLine();
        System.out.println("Id:");
        int id = sc.nextInt();
        System.out.println("Description:");
        String bab =sc.nextLine();
        Organisation org = new Organisation(name,id,bab);
         System.out.println("---------SUBJECT----------");
        System.out.println("Nom :");
        String name1 =sc.nextLine();
        System.out.println("Poste :");
        String poste =sc.nextLine();
        System.out.println("Id:");
        int id1 =sc.nextInt();
        System.out.println("Bagde_blue :");
        boolean bool =sc.nextBoolean();
        Subject sub=new Subject(name1,poste,id1,bool);
        System.out.println("-------Ressource--------- ");
        System.out.println("Nom:");
        String baba =sc.nextLine();
        Ressource re=new Ressource(baba);
        System.out.println("-------ACTION--------- ");
        System.out.println("ActionType:");
        String name3 =sc.nextLine();
        Action ac =new Action(name3);
    }


 
**JSONPermisson.json**

fichier contenant la politique d'acces du Modele:

```
{
"orgaizationname":"21Street",
"subjectname":"Mamadou",
"subjectposte":"comptable",
"objectename":"repertoire"
"actiontype":"lire",
"comportement":"bon",
"autorisation":"accepte"
}
```

l'attribution de la permission ne dependra pas seulement des attributs  du USER .Elle dependra aussi du comportement du User dans le parking lors d'une visite.


Offloading
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

Collaboration
-------------

L'exigence communicative de l'IoT nous oblige à nous libérer de l'architecture centralisée. Pour ce faire, nous avons choisi d'étendre notre modèle en fournissant une couche collaborative entre organisations, cette couche permettra aux sujets d'une organisation  de bénéficier d'objets qui ne sont pas nécessairement dans la même organisation

```
java.lang.Object obj = null;
      try {
            obj = new JSONParser().parse(new FileReader("JSONattributs.json"));
        } catch (IOException e) {
            System.out.println("fichier non ouvert ");
        } catch (ParseException e) {
            e.printStackTrace();
        }
        JSONObject objet1 = (JSONObject) obj;
        JSONObject sousObjet1 = (JSONObject) objet1.get("organization");
        JSONObject sousObjet2 = (JSONObject) objet1.get("subject");
        if(sousObjet1.get("name").equals(org.getName()) && !(sousObjet2.get("name").equals(sub.getName())))
        {
            System.out.println("Vouns ne faites pas parti de cette orgnisation ,Veuillez presente votre badge_blue ");
            if (sub.isBadge_blue()) {
                new CentralNode_DP(req, par);
            } else {

                new CentralNode_STANDARD(req,par);
            }
           }
    }
```
 Nous considérerons deux zones: une zone standard accessible à tous (public) dans le cadre d'un marché public et une zone réservée aux personnes à mobilité réduite (PRM) gérée par un contrat privé. Les PRM sont identifiés par un badge (badge bleu).

La personne peut présenter un badge d'identification PRM. Dans le cas où le sujet présente un badge PRM, le nœud central pour PRM (CN_PRM) est consulté en priorité. Dans l'autre cas, c'est la Norme de nœud central (CN_STANDARD) qui est consultée en priorité.


 
