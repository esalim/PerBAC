package com.Attributs;

public class PolicyDecisionPoint {

    /* Cette classe qui détermine s'il convient d'autoriser ou non la demande d'un utilisateur,
    en fonction des informations disponibles (attributs) et des règles de sécurité applicables */


    private Requester requester;
    private ParkingPlace parkingPlace;


    public PolicyDecisionPoint(Requester requester, ParkingPlace parkingPlace) {
        this.requester = requester;
        this.parkingPlace = parkingPlace;
    }

    public String[] recuperation(Requester requester, ParkingPlace parkingPlace) {
        // recupere les info dans le PolicyInformationPoint.java et renvoie les attribts sous forme de tableau
        return new PolicyInformationPoint(parkingPlace, requester).extractionAttribut();
    }

    public void validation() { // renvoie un boolean apres verification auprès du PolicyAccessPoint.java
        if (requester.getSubject().isBadge_blue()) {
            if ((new PolicyAccessPoint(this.recuperation(this.requester, this.parkingPlace)).accessContole())) {
                // AvailibilityManager test =new AvailibilityManager();
                //test.makeAvailibility();
                System.out.println("Appartenant à l'Organisation " + requester.getOrganisation().getName() +  " , Monsieur " + requester.getSubject().getName() +  " est autorisé à effectuer cette action pour acceder à la " + parkingPlace.getRessource().getName() + " */ ");
            } else {
                System.out.println("Appartenant à l'Organisation " + requester.getOrganisation().getName() +  " , Monsieur " + requester.getSubject().getName() +  " n'est pas autorisé à effectuer cette action pour acceder à la " + parkingPlace.getRessource().getName() + " */ ");
            }
        } else {
            if ((new PolicyAccessPoint(this.recuperation(this.requester, this.parkingPlace)).accesControlStandard())) {
                //AvailibilityManager test =new AvailibilityManager();
                //test.makeAvailibility();
                System.out.println("Appartenant à l'Organisation " + requester.getOrganisation().getName() +  " , Monsieur " + requester.getSubject().getName() +  " est autorisé à effectuer cette action pour acceder à la " + parkingPlace.getRessource().getName() + " */ ");
            } else {
                System.out.println("Appartenant à l'Organisation " + requester.getOrganisation().getName() +  " , Monsieur " + requester.getSubject().getName() +  " n'est pas autorisé à effectuer cette action pour acceder à la " + parkingPlace.getRessource().getName() + " */ ");
                //AvailibityManagerHandicap testHandicap =new AvailibityManagerHandicap();
                //testHandicap.makeAvailibility();
            }

        }

    }
}
