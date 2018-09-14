package com.Attributs;

public class Ressource {
    /*
    class contenant les attributs de la ressource demandee
     */
    private String name;
    Ressource(String name)
    {
        this.name=name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getName() {
        return name;
    }

}

