package com.Attributs;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;
import org.json.simple.parser.ParseException;

import java.io.FileReader;
import java.io.IOException;
import java.io.PrintWriter;
import java.net.Socket;
import java.net.UnknownHostException;

public class AvailibilityManager {
    private JSONObject sObjet1;
    private JSONObject sObjet2;
    private JSONObject sObjet3;

    public AvailibilityManager() {
        //permet de gerer la base de donnees du parking. Cette base de donnees est remplacee par un fichier(JSONParking.json)
        java.lang.Object obj = null;
        try {
            obj = new JSONParser().parse(new FileReader("JSONParking.json"));
        } catch (IOException e) {
            System.out.println("fichier non ouvert ");
        } catch (ParseException e) {
            e.printStackTrace();
        }
        JSONObject obje = (JSONObject) obj;
        sObjet1 = (JSONObject) obje.get("zoneA");
        sObjet2 = (JSONObject) obje.get("zoneB");
        sObjet3 = (JSONObject) obje.get("zoneC");

    }

    public String makeFree()
    //la methode permet de savoir si une place est disponible ou non
    // elle retourne une chaine de caractere qui represente la zone et la place libre en question
    {
        String[] tab = {"place0", "place1", "place2", "place3", "place4", "place5", "place6", "place7"};
        int i = 0;
        while (sObjet1.get(tab[i]).equals("occupe"))
            i++;
        return "ZONE A : " + tab[i];
    }





            public void makeAvailibility()
            {
// elle permet d'envoyer l'etat du parking a un autre pc afin d'etre stocke dans le fichier serveurparking.txt
                Socket socket;
                PrintWriter out;

                try {
                    socket = new Socket("192.168.1.161",2009);
                    //  System.out.println("Un zéro s'est connecté");
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

           }

