package com.vehicletrackingsys.api.controllers;

import com.vehicletrackingsys.api.dtos.UserDTO;
import com.vehicletrackingsys.api.services.DriverService;
import com.vehicletrackingsys.api.services.UserService;
import com.vehicletrackingsys.api.services.VehicleService;
import jakarta.servlet.http.HttpSession;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.util.UUID;

@Controller
@RequestMapping("/")
public class UserController {

    @Autowired
    private UserService userService;

    @Autowired
    private VehicleService vehicleService;

    @Autowired
    private DriverService driverService;

    @GetMapping("login")
    public String showLoginPage() {
        return "user/login";
    }

    @GetMapping("register")
    public String showRegisterPage() {
        return "user/signup";
    }

    @PostMapping("register")
    public String registerUser(@RequestParam String username,
                               @RequestParam String email,
                               @RequestParam String password,
                               HttpSession session,
                               Model model) {
        try {
            UserDTO newUser = new UserDTO();
            newUser.setUsername(username);
            newUser.setEmail(email);
            newUser.setRoleName("USER"); // Default role

            UserDTO registeredUser = userService.registerUser(newUser, password);
            session.setAttribute("userId", registeredUser.getId());
            return "redirect:/t/dashboard";
        } catch (IllegalStateException e) {
            model.addAttribute("error", e.getMessage());  // Add the error message to the model
            return "user/signup";  // Redirect back to the register page with the error
        } catch (Exception e) {
            model.addAttribute("error", "Registration failed. Please try again.");
            return "user/signup";  // Redirect back to the register page with a generic error message
        }
    }


    // User login endpoint
    @PostMapping("login")
    public String loginUser(@RequestParam String email,
                            @RequestParam String password,
                            HttpSession session,
                            Model model) {
        // Authenticate the user
        UserDTO authenticatedUser = userService.authenticateUser(email, password);
        if (authenticatedUser != null) {
            session.setAttribute("userEmail", authenticatedUser.getEmail());
            return "redirect:/t/dashboard";
        } else {

            model.addAttribute("error", "Invalid email or password. Please try again.");
            return "user/login";
        }
    }


    // Logout endpoint
    @GetMapping("logout")
    public String logout(HttpSession session) {
        session.invalidate();
        return "redirect:/login";
    }
}
