package com.Attributs;

public class ParkingPlace {

    // Cette classe regroupe et definit la ressource qu'on veut acceder ainsi que
    // l'action qu'on veut executer sur cette ressource

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
