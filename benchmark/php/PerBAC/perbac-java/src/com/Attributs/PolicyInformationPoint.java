package com.Attributs;

import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;
import org.json.simple.parser.ParseException;

import java.io.FileReader;
import java.io.IOException;

public class PolicyInformationPoint {

    private Requester requester;

    //private ArrayList<String> extractab;
    String PolicyResponse[] = new String[15];

    PolicyInformationPoint(ParkingPlace parkingPlace, Requester requester) {

        /* cette class permet d'extraire les attributs supplementaires de l'utilisateur a travers la
    fonction exctractionAttribut. il va consulter le fichier Attributs.json ou sont stockes les infos du l'USER
    @params Requester requester
    @params Requester requester;
    return String[] PolicyResponse;
     */
        this.requester = requester;
    }

    public String[] extractionAttribut() {

        String[] tab = {"name", "organizationIdentifer", "description", "secteur"};
        //pour balayer les cle du fichier facilement
        String[] tab2 = {"name", "poste", "userId", "habilitation"};
        int j, i;
        Object obj = null;
        try {
            obj = new JSONParser().parse(new FileReader("Attributs.json"));
        } catch (IOException e) {
            System.out.println("Le fichier n'as pas pu etre ouvert ! ");
        } catch (ParseException e) {
            e.printStackTrace();
        }
        //pour fragmenter le fichier json en sous fichier json pour facilement le manipuler
        JSONObject objet1 = (JSONObject) obj;
        JSONObject sousObjet1 = (JSONObject) objet1.get("organisation");
        JSONObject sousObjet2 = (JSONObject) objet1.get("sujet");
        JSONObject sousObjet3 = (JSONObject) objet1.get("objet");
        JSONObject sousObjet4 = (JSONObject) objet1.get("action");
        if (requester.getOrganisation().getName().equals(sousObjet1.get("name"))) {


            for (i = 0; i < tab.length; i++) {
                PolicyResponse[i] = (String) sousObjet1.get(tab[i]);
            }
            i = i + 1;
            for (j = 0; j < tab2.length; j++) {
                PolicyResponse[i] = (String) sousObjet2.get(tab2[j]);
                i = i + 1;
            }
            PolicyResponse[i] = (String) sousObjet3.get("name");
            PolicyResponse[i + 1] = (String) sousObjet3.get("categorie");
            PolicyResponse[i + 2] = (String) sousObjet4.get("actiontype");

            return PolicyResponse;

        } else {
            return null;
        }

    }
}
