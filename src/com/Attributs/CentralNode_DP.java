package com.Attributs;

public class CentralNode_DP {
    private Requester requester;
    private ParkingPlace parkingPlace;

    public CentralNode_DP(Requester requester, ParkingPlace parkingPlace) {
        this.parkingPlace=parkingPlace;
        this.requester=requester;
        PolicyDecisionPoint pdp=new PolicyDecisionPoint(requester,parkingPlace);
        pdp.validation();



    }

}
