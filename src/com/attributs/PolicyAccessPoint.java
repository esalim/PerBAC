package com.Attributs;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;
import org.json.simple.parser.ParseException;

import java.io.FileReader;
import java.io.IOException;

public class PolicyAccessPoint {
    private String[] valeur;

    PolicyAccessPoint(String[] valeur) {
        this.valeur = valeur;
    }
/*
cette class permet de verifier la permission accorde a un USER . Il prend en parametre un tableau de STRING.
 */

    public boolean accessContole() {
        java.lang.Object obj = null;
        try {
            //ouverture du fichier pour extraire des infos
            obj = new JSONParser().parse(new FileReader("JSONPermission.json"));
        } catch (IOException e) {
            System.out.println("fichier non ouvert ");
        } catch (ParseException e) {
            e.printStackTrace();
        }
        JSONObject objet1 = (JSONObject) obj;
        //System.out.println(valeur[9]);
        //System.out.println(objet1.get("autorisation").equals("accepte"));

// effectue une comparaison entre les attributs stockes dans le fichier JSONPermission.json et les attributs du
        // USER . la Fonction retourne un boolean suivant le comportement du User
        if (valeur[0].equals(objet1.get("orgaizationname")))
            if ( valeur[5].equals(objet1.get("subjectname")) && valeur[6].equals(objet1.get("subjectposte")) && valeur[9].equals(objet1.get("objectename")) && valeur[11].equals(objet1.get("actiontype"))) {
                if (objet1.get("autorisation").equals("accepte")) {
                    if (objet1.get("comportement").equals("bon")) {
                        return true;
                    } else {
                        return false;
                    }


                } else {
                    return false;
                }
            } else {
                return false;
            }
        else {
            return false;
        }
        }

}












