package com.vehicletrackingsys.api.controllers;

import com.vehicletrackingsys.api.dtos.VehicleDTO;
import com.vehicletrackingsys.api.services.VehicleService;
import jakarta.servlet.http.HttpSession;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.List;
import java.util.UUID;

@Controller
@RequestMapping("/t")
public class VehicleController {

    @Autowired
    private VehicleService vehicleService;

    // Display all vehicles for the user
    @GetMapping("/vehicles")
    public String getVehiclesByEmail(Model model, HttpSession session) {
        String email = (String) session.getAttribute("userEmail");

        // Check if the user has vehicles
        if (email == null || !vehicleService.userHasVehiclesByEmail(email)) {
            return "user/no-vehicles"; // Redirect or display message if no vehicles found
        }

        // Fetch vehicles associated with the logged-in user
        List<VehicleDTO> vehicles = vehicleService.getVehiclesByEmail(email);
        model.addAttribute("vehicles", vehicles);
        model.addAttribute("pageLabel", "Vehicle");
        return "user/vehicle"; // Return to vehicle listing page
    }


    // Return vehicles as JSON for API requests
    @ResponseBody
    @GetMapping("/vehicles/json")
    public List<VehicleDTO> getVehicles(HttpSession session) {
        String email = (String) session.getAttribute("userEmail");

        // If email is not found in the session, return an empty list or handle it accordingly
        if (email == null) {
            return new ArrayList<>(); // Return empty list if no email in session
        }

        // Fetch vehicles associated with the logged-in user
        return vehicleService.getVehiclesByEmail(email);
    }

    // Get vehicle by ID
    @GetMapping("/vehicles/{id}")
    public String getVehicleById(@PathVariable UUID id, Model model) {
        VehicleDTO vehicle = vehicleService.getVehicleById(id);
        model.addAttribute("vehicle", vehicle);
        return "user/vehicle-detail"; // Return to a detailed vehicle page
    }

    // Create a new vehicle
    @PostMapping("/vehicles")
    public String createVehicle(@RequestBody VehicleDTO vehicleDto, HttpSession session) {
        VehicleDTO createdVehicle = vehicleService.createVehicle(vehicleDto, session);
        return "redirect:/t/vehicles"; // Redirect after creation
    }

    // Update an existing vehicle
    @PutMapping("/vehicles/{id}")
    public String updateVehicle(@PathVariable UUID id, @RequestBody VehicleDTO vehicleDto) {
        vehicleDto.setId(id);
        vehicleService.updateVehicle(vehicleDto);
        return "redirect:/t/vehicles"; // Redirect after update
    }

    // Delete a vehicle by ID
    @DeleteMapping("/vehicles/d/{id}")
    public String deleteVehicle(@PathVariable UUID id) {
        vehicleService.deleteVehicle(id);
        return "redirect:/t/vehicles"; // Redirect after deletion
    }
}
