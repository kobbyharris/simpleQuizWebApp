package com.vehicletrackingsys.api.dtos;

import lombok.*;

import java.util.UUID;

@Getter
@Setter
@Data
public class DriverDTO {
    private UUID id;
    private String fullName;
    private String ghanaCard;
    private String residentialAddress;
    private String phoneNumber;
    private String assignedVehicleLicensePlate;


    public UUID getId() {
        return id;
    }

    public void setId(UUID id) {
        this.id = id;
    }

    public String getFullName() {
        return fullName;
    }

    public void setFullName(String fullName) {
        this.fullName = fullName;
    }

    public String getGhanaCard() {
        return ghanaCard;
    }

    public void setGhanaCard(String ghanaCard) {
        this.ghanaCard = ghanaCard;
    }

    public String getResidentialAddress() {
        return residentialAddress;
    }

    public void setResidentialAddress(String residentialAddress) {
        this.residentialAddress = residentialAddress;
    }

    public String getPhoneNumber() {
        return phoneNumber;
    }

    public void setPhoneNumber(String phoneNumber) {
        this.phoneNumber = phoneNumber;
    }

    public String getAssignedVehicleLicensePlate() {
        return assignedVehicleLicensePlate;
    }

    public void setAssignedVehicleLicensePlate(String assignedVehicleLicensePlate) {
        this.assignedVehicleLicensePlate = assignedVehicleLicensePlate;
    }
}
