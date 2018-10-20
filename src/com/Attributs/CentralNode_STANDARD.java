package com.Attributs;

public class CentralNode_STANDARD {
    private Requester requester;
    private ParkingPlace parkingPlace;

    public CentralNode_STANDARD(Requester requester,ParkingPlace parkingPlace) {
        this.parkingPlace=parkingPlace;
        this.requester=requester;
        PolicyDecisionPoint pdp=new PolicyDecisionPoint(requester,parkingPlace);
        pdp.validation();
    }
}
