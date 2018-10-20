package com.Attributs;

public class Organisation {
    private String name;
    private int organizationIdentifier;
    private String description;

    Organisation(String name, int organizationIdentifier, String description)
    {
        this.name=name;
        this.organizationIdentifier=organizationIdentifier;
        this.description=description;
    }
    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setOrganizationIdentifier(int organizationIdentifier) {
        this.organizationIdentifier = organizationIdentifier;
    }

    public int getOrganizationIdentifier() {
        return organizationIdentifier;
    }


    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

}
