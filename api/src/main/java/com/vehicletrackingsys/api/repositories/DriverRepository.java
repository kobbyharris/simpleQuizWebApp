package com.vehicletrackingsys.api.repositories;

import com.vehicletrackingsys.api.models.Driver;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.UUID;

public interface DriverRepository extends JpaRepository<Driver, UUID> {
    int countById(UUID ownerId);
}