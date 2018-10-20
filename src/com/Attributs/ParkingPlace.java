package com.Attributs;

public class ParkingPlace {
       // on definit la ressource qu'on veut acceder et l'action qu'on veut executer
    //on definit l'action qu'on veut executer sur cette ressource
    private Ressource ressource;
    private Action action;

     ParkingPlace(  Ressource ressource,Action action) {
        this.ressource = ressource;
        this.action=action;
    }

    public void setRessource(Ressource ressource) {
        this.ressource = ressource;
    }

    public Ressource getRessource() {
        return ressource;
    }

    public void setAction(Action action) {
        this.action = action;
    }

    public Action getAction() {
        return action;
    }

}
