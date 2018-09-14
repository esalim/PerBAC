package com.Attributs;
public class Main {

    public static void main(String[] args) throws Exception {

        Organisation org = new Organisation("21Street",50,"militaire");
        Subject sub=new Subject("Mamadou","comptable",18);
        Ressource re=new Ressource(("repertoire"));
        Action ac =new Action("lire");
        Requester req = new Requester(org,sub);
        ParkingPlace par=new ParkingPlace(re,ac);
    PolicyDecisionPoint pdp=new PolicyDecisionPoint(req,par);
            pdp.validation();



    }
}
