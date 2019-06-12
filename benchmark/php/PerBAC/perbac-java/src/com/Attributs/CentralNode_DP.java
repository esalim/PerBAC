package com.Attributs;

public class CentralNode_DP {

    // Cette classe est appelée pour le traitement d'un sutilisateur ayant un badge bleu

    private Requester requester;
    private ParkingPlace parkingPlace;

    public CentralNode_DP(Requester requester, ParkingPlace parkingPlace) {
        this.parkingPlace=parkingPlace;
        this.requester=requester;
        PolicyDecisionPoint pdp=new PolicyDecisionPoint(requester,parkingPlace);
        pdp.validation();
    }

}
