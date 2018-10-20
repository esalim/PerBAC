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
        System.out.println("---------ORGANISATION----------");
        System.out.println("Nom :");
        String name =sc.nextLine();
        System.out.println("Id:");
        int id = sc.nextInt();
        Scanner sc1=new Scanner(System.in);

        System.out.println("Description:");
        String des =sc1.nextLine();
        Organisation org = new Organisation(name,id,des);
        System.out.println("---------SUBJECT----------");
        System.out.println("Nom :");
        String name1 =sc1.nextLine();
        Scanner sc2=new Scanner(System.in);
        System.out.println("Poste :");
        String poste =sc2.nextLine();
        System.out.println("Id:");
        int id1 =sc2.nextInt();
        System.out.println("Bagde_blue :");
        boolean bool =sc2.nextBoolean();
        Subject sub=new Subject(name1,poste,id1,bool);
        //Subject sub=new Subject("Mamado","comptable",18,false);

        System.out.println("-------Ressource--------- ");
        Scanner sc3=new Scanner(System.in);
        System.out.println("Nom:");
        String baba =sc3.nextLine();
        Ressource re=new Ressource(baba);


        System.out.println("-------ACTION--------- ");
        System.out.println("ActionType:");
        String name3 =sc3.nextLine();
        Action ac =new Action(name3);


        Requester req = new Requester(org,sub);
        ParkingPlace par=new ParkingPlace(re,ac);
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


}
