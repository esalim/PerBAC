package com.Attributs;

public class PolicyDecisionPoint {
    private Requester requester;
    private ParkingPlace parkingPlace;
    //private PolicyInformationPoint pip;
    private PolicyAccessPoint pap;
    private String[] PolicyResponse;


    public PolicyDecisionPoint(Requester requester, ParkingPlace parkingPlace) {
        this.requester = requester;
        this.parkingPlace = parkingPlace;
    }
    public String[] recuperation(Requester requester, ParkingPlace parkingPlace)
    {
        // recupere les info dans le PolicyInformationPoint.java et renvoie les attribts sous forme de tableau
       PolicyResponse=new PolicyInformationPoint(parkingPlace,requester).extractionAttribut();
        return PolicyResponse;

            }

    public void validation ()
    {
        //renvoie un boolean selon la verification des politiques dans le PolicyAccessPoint.java
        if((new PolicyAccessPoint(this.recuperation(this.requester, this.parkingPlace)).accessContole()))
        {
            AvailibilityManager test =new AvailibilityManager();
            test.makeAvailibility();
            System.out.println("ORG: "+requester.getOrganisation().getName()+" ---SUBJECT :"+requester.getSubject().getName()+" ----OBJECT : "+parkingPlace.getRessource().getName()+" est autorise à effectuer cette action ");
        }
        else {
            System.out.println("ORG: "+requester.getOrganisation().getName()+" ---SUBJECT :"+requester.getSubject().getName()+" ----OBJECT : "+parkingPlace.getRessource().getName()+"n'as pas la permission");
        }


    }
}
