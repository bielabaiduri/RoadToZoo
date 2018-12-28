package com.splash.user.event;

public class Event {

    String strEventName;
    String strEventDate;
    String strEventTime;
    String strEventPlace;
    String strDescription;
    String strHandleBy;
    String strTarget;

    public Event(String strEventName, String strEventDate, String strEventTime, String strEventPlace, String strDescription, String strHandleBy, String strTarget) {
        this.strEventName = strEventName;
        this.strEventDate = strEventDate;
        this.strEventTime = strEventTime;
        this.strEventPlace = strEventPlace;
        this.strDescription = strDescription;
        this.strHandleBy = strHandleBy;
        this.strTarget = strTarget;
    }

    public String getStrEventName() {
        return strEventName;
    }

    public void setStrEventName(String strEventName) {
        this.strEventName = strEventName;
    }

    public String getStrEventDate() {
        return strEventDate;
    }

    public void setStrEventDate(String strEventDate) {
        this.strEventDate = strEventDate;
    }

    public String getStrEventTime() {
        return strEventTime;
    }

    public void setStrEventTime(String strEventTime) {
        this.strEventTime = strEventTime;
    }

    public String getStrEventPlace() {
        return strEventPlace;
    }

    public void setStrEventPlace(String strEventPlace) {
        this.strEventPlace = strEventPlace;
    }

    public String getStrDescription() {
        return strDescription;
    }

    public void setStrDescription(String strDescription) {
        this.strDescription = strDescription;
    }

    public String getStrHandleBy() {
        return strHandleBy;
    }

    public void setStrHandleBy(String strHandleBy) {
        this.strHandleBy = strHandleBy;
    }

    public String getStrTarget() {
        return strTarget;
    }

    public void setStrTarget(String strTarget) {
        this.strTarget = strTarget;
    }
}
