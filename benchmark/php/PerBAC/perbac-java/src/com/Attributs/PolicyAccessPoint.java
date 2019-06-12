package com.Attributs;

import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;
import org.json.simple.parser.ParseException;

import java.io.FileReader;
import java.io.IOException;

public class PolicyAccessPoint {
    private JSONObject objet1;
    private String[] valeur;

    PolicyAccessPoint(String[] valeur) {

        this.valeur = valeur;
        Object obj = null;
        try {
            //ouverture du fichier pour extraire des infos
            obj = new JSONParser().parse(new FileReader("Permission.json"));
        } catch (IOException e) {
            System.out.println("Le fichier n'as pas pu etre ouvert ! ");
        } catch (ParseException e) {
            e.printStackTrace();
        }
        this.objet1 = (JSONObject) obj;
    }

    /* C'est cette fonction qui verifie la permission pour un User et elle prend un tableau de String.*/

    public boolean accessContole() {

        // effectue une comparaison entre les attributs stockes dans le fichier Permission.json et les attributs du
        // sujet. la Fonction retourne un boolean suivant le comportement de l'utilisateur.

        if (valeur[0].equals(objet1.get("nomOrganisation")))
            if (valeur[5].equals(objet1.get("nomSujet")) && valeur[6].equals(objet1.get("poste")) && valeur[9].equals(objet1.get("nomObjet")) && valeur[11].equals(objet1.get("actiontype"))) {
                if (objet1.get("autorisation").equals("accepte")) {
                    return objet1.get("comportement").equals("bon");
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

    public boolean accesControlStandard() {
        return valeur[0].equals(objet1.get("nomOrganisation")) && objet1.get("autorisation").equals("accepte");
    }
}













