package com.Attributs;

public class Action {
    //l'action qu'on veut executer sur la ressource
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
