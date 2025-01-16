package com.vehicletrackingsys.api.services;

import com.vehicletrackingsys.api.models.User;
import com.vehicletrackingsys.api.models.Vehicle;
import com.vehicletrackingsys.api.repositories.UserRepository;
import com.vehicletrackingsys.api.repositories.VehicleRepository;
import com.vehicletrackingsys.api.dtos.VehicleDTO;
import jakarta.servlet.http.HttpSession;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Optional;
import java.util.UUID;
import java.util.stream.Collectors;

@Service
public class VehicleService {

    @Autowired
    private VehicleRepository vehicleRepository;

    @Autowired
    private UserRepository userRepository;

    /**
     * Retrieves the user ID from the session and returns it as a UUID.
     */
    public String getUserIdFromSession(HttpSession session) {
        return (String) session.getAttribute("userEmail");
    }

    /**
     * Check if a user owns any vehicles.
     */
    public boolean userHasVehiclesByEmail(String email) {
        return !vehicleRepository.findByOwnerEmail(email).isEmpty();
    }


    /**
     * Retrieve all vehicles and convert them to DTOs.
     */
    public List<VehicleDTO> getVehiclesByEmail(String email) {
        // Fetch only the vehicles that belong to the logged-in user
        return vehicleRepository.findByOwnerEmail(email).stream()
                .map(this::convertToDto)
                .collect(Collectors.toList());
    }


    /**
     * Get a single vehicle by ID.
     */
    public VehicleDTO getVehicleById(UUID id) {
        Optional<Vehicle> vehicle = vehicleRepository.findById(id);
        return vehicle.map(this::convertToDto).orElse(null);
    }

    /**
     * Delete a vehicle by its ID.
     */
    public void deleteVehicle(UUID vehicleId) {
        vehicleRepository.deleteById(vehicleId);
    }

    /**
     * Update a vehicle.
     */
    public VehicleDTO updateVehicle(VehicleDTO vehicleDto) {
        Optional<User> owner = Optional.empty();
        if (vehicleDto.getOwner() != null) {
            UUID ownerId = UUID.fromString(vehicleDto.getOwner());
            owner = userRepository.findById(ownerId);
        }

        Vehicle vehicle = convertToEntity(vehicleDto, owner.orElse(null));
        Vehicle updatedVehicle = vehicleRepository.save(vehicle);
        return convertToDto(updatedVehicle);
    }

    /**
     * Create a new vehicle.
     */
    public VehicleDTO createVehicle(VehicleDTO vehicleDto, HttpSession session) {
        String userEmail = getUserIdFromSession(session);
        User owner = userRepository.findByEmail(userEmail)
                .orElseThrow(() -> new IllegalArgumentException("Invalid owner ID"));

        Vehicle vehicle = convertToEntity(vehicleDto, owner);
        Vehicle savedVehicle = vehicleRepository.save(vehicle);
        return convertToDto(savedVehicle);
    }

    /**
     * Convert a Vehicle entity to a VehicleDTO.
     */
    private VehicleDTO convertToDto(Vehicle vehicle) {
        VehicleDTO dto = new VehicleDTO();
        dto.setId(vehicle.getId());
        dto.setLicensePlate(vehicle.getLicensePlate());
        dto.setMake(vehicle.getMake());
        dto.setModel(vehicle.getModel());
        dto.setImageUrl(vehicle.getImageUrl());
        dto.setOwner(vehicle.getOwner() != null ? vehicle.getOwner().getId().toString() : null);
        return dto;
    }

    private Vehicle convertToEntity(VehicleDTO dto, User owner) {
        Vehicle vehicle = new Vehicle();
        vehicle.setId(dto.getId());
        vehicle.setLicensePlate(dto.getLicensePlate());
        vehicle.setMake(dto.getMake());
        vehicle.setModel(dto.getModel());
        vehicle.setImageUrl(dto.getImageUrl());
        vehicle.setOwner(owner);
        return vehicle;
    }
}
