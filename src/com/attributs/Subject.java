package com.Attributs;

public class Subject {
    /*
    class contenant les attributs du sujet
     */
    private String name;
    private String poste;
    private int userId;
    Subject(String name,String poste, int  userId)
    {
        this.name=name;
        this.poste=poste;
        this.userId=userId;

    }

    public void setName(String name) {
        this.name = name;
    }

    public String getName() {
        return name;
    }

    public int getUserId() {
        return userId;
    }

    public String getPoste() {
        return poste;
    }

    public void setPoste(String poste) {
        this.poste = poste;
    }

    public void setUserId(int userId) {
        this.userId = userId;
    }
}


