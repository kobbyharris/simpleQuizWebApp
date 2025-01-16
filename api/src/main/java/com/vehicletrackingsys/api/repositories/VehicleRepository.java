package com.vehicletrackingsys.api.repositories;

import com.vehicletrackingsys.api.models.Vehicle;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;
import java.util.UUID;

public interface VehicleRepository extends JpaRepository<Vehicle, UUID> {
    List<Vehicle> findByOwnerEmail(String email);
}
