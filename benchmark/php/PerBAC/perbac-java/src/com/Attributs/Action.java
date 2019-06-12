package com.Attributs;

public class Action {

    /* Classe Action : cette classe represente l'action à effectuer sur la ressource */

    private String actionType;
    Action(String  actionType)
    {
        this.actionType=actionType;
    }

    public String getActionType() {
        return actionType;
    }

    public void setActionType(String actionType) {
        this.actionType = actionType;
    }
}
