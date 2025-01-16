package com.vehicletrackingsys.api.services;

import com.vehicletrackingsys.api.repositories.DriverRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.UUID;

@Service
public class DriverService {

    @Autowired
    private DriverRepository driverRepository;

    // Check if the user has drivers
    public boolean userHasDrivers(UUID ownerId) {
        return driverRepository.countById(ownerId) > 0;
    }
}