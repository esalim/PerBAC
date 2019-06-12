package com.Attributs;

public class Subject {
    /*
    C'est la classe subject qui contient les attributs du sujet souhaitant acceder à une ressource
    */
    private String name;
    private String poste;
    private int userId;
    private  boolean badge_blue;
    Subject(String name,String poste, int  userId,boolean badge_blue)
    {
        this.name=name;
        this.poste=poste;
        this.userId=userId;
        this.badge_blue=badge_blue;
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

    public boolean isBadge_blue() {
        return badge_blue;
    }

    public void setBadge_blue(boolean badge_blue) {
        this.badge_blue = badge_blue;
    }

}


