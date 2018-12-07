# PerBAC
Pervasive Based Access Control Model

 Introduction 
------------

This library allows a practical implementation of the **PerBAC** access control model.

We choose to build our model based mainly on ABAC as a standard global AC model that, on the one hand, uses the concept of attributes very advantageous in decentralized IoT environments, and on the other hand includes the benefits of several abstract concepts and other generic AC models such as RBAC.


Prérequis 
-----------
Install java-JDK :

`sudo apt-get install openjdk-7-jdk`

Clone PerBAC :

`git clone https://github.com/esalim/PerBAC.git`

Download the library JSON :

`https://jar-download.com/artifacts/org.json`

Import the library:

`javac -cp json-20180813.jar yourfilename.java `.


Example
-------

Let's take an access control verification by the PerBAC model.

 A user has attributes (characteristics) and wants to access a resource to perform an action.
 
 For example, we can have the following code:
 

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

File containing the AC policy of the model:

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

Granting the permission will not only depend on the attributes of the USER, but also on the behaviour of this latter in the smart parking during his visit.

Offloading
-------------

The main advantage of Perbac is that it allows control decentralization to be carried without losing the effectiveness of ABAC and RBAC. The class **AvailabiltyManager** allows to control the availability of the parking places in case there is a request. It sends this state to a server that will store the data in a file **serverParking.txt**. 

As an example, we can have the following code:

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

Install a server:

`sudo apt-get install apache2`



Create a directory in the folder '/var/www/html/' . Copy and paste the following code into a .java file in the directory you created



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

The communicative requirement of the IoT forces us to leave out centralized architectures. To do so, we have chosen to extend our model by providing a collaborative layer between organizations, this layer will allow the subjects of an organization to benefit from objects that are not necessarily in the same organization

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

 We will consider two zones: a standard zone accessible to all (public) via a public contract and an area reserved for people with reduced mobility (PRM) managed by a private contract. PRMs are identified by a badge (blue badge).

The person may present a PRM identification badge. If the subject has a PRM badge, the central node for PRM (CN_PRM) is consulted first. Otherwise, it's the Central Node Standard (CN_STANDARD) that is consulted first.
 
