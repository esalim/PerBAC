package com.Attributs;

public class Requester {
    /*
     Cette classe fait office de noeud central dans notre architecture.
     la classe Requester recoit tous les attributs sur le sujet et l'organisation
     */
    private Organisation organisation;
    private Subject subject;

    public Requester( Organisation organisation, Subject subject) {

        this.organisation = organisation;
        this.subject = subject;
    }

    public Organisation getOrganisation() {
        return organisation;
    }

    public void setOrganisation(Organisation organisation) {
        this.organisation = organisation;
    }

    public Subject getSubject() {
        return subject;
    }

    public void setSubject(Subject subject) {
        this.subject = subject;
    }

}
