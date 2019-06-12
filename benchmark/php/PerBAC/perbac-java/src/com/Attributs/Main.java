package com.Attributs;

import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;
import org.json.simple.parser.ParseException;

import java.io.FileReader;
import java.io.IOException;
import java.util.Scanner;

public class Main {

    public static void main(String[] args) throws Exception {
        Scanner sc=new Scanner(System.in);
        System.out.println("************************ ORGANISATION **************************");
        System.out.print("Nom : ");
        String name =sc.nextLine();
        System.out.print("OrganisationId : ");
        int id = sc.nextInt();
        Scanner sc1=new Scanner(System.in);
        System.out.print("Description : ");
        String des =sc1.nextLine();
        Organisation org = new Organisation(name,id,des);

        System.out.println("************************ Utilisateur **************************");
        System.out.print("Nom : ");
        String name1 =sc1.nextLine();
        Scanner sc2=new Scanner(System.in);
        System.out.print("Poste : ");
        String poste =sc2.nextLine();
        System.out.print("UserId : ");
        int id1 =sc2.nextInt();
        System.out.print("Avez vous un Bagde_blue : ");
        boolean bool =sc2.nextBoolean();
        Subject sub=new Subject(name1,poste,id1,bool);

        System.out.println("************************ Ressource **************************");
        Scanner sc3=new Scanner(System.in);
        System.out.print("Nom : ");
        String baba =sc3.nextLine();
        Ressource re=new Ressource(baba);


        System.out.println("************************ Action **************************");
        System.out.print("ActionType : ");
        String name3 =sc3.nextLine();
        Action ac =new Action(name3);


        Requester req = new Requester(org,sub);
        ParkingPlace par=new ParkingPlace(re,ac);

        Object obj = null;

        try {
            obj = new JSONParser().parse(new FileReader("Attributs.json"));
        } catch (IOException e) {
            System.out.println("Le fichier n'as pas pu etre ouvert ! ");
        } catch (ParseException e) {
            e.printStackTrace();
        }
        JSONObject objet1 = (JSONObject) obj;
        JSONObject sousObjet1 = (JSONObject) objet1.get("organisation");
        JSONObject sousObjet2 = (JSONObject) objet1.get("sujet");

        if(sousObjet1.get("name").equals(org.getName()) && (sousObjet2.get("name").equals(sub.getName())))
        {
            System.out.println(" "); // Espace
            System.out.println("Vous faites bien parti de cette organisation , veuillez patienter pour le traitement de l'operation ! ");
            System.out.println(" "); // Espace
            if (sub.isBadge_blue()) {
                System.out.println("\"****************************************** MIT Academy Parking ****************************************************\" ");
                System.out.println("/*                                                                                                                    */");
                System.out.print("/* ");
                new CentralNode_DP(req, par);
                System.out.println("/*                                                                                                                   */");
                System.out.println("\"*******************************************************************************************************************\" ");

            } else {
                System.out.println("\"********************************************* MIT Personnal Parking ***********************************************\" ");
                System.out.println("/*                                                                                                                    */");
                System.out.print("/* ");
                new CentralNode_STANDARD(req,par);
                System.out.println("/*                                                                                                                   */");
                System.out.println("\"*******************************************************************************************************************\" ");
            }
           }
        else{
            System.out.println(" "); // Espace
            System.out.println("L'authentification a echouée , vous n'avez  pas les droits d'accès pour effectuer cette opération ! ");
        }

    }


}
