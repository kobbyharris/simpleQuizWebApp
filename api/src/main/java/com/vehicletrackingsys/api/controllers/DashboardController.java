package com.vehicletrackingsys.api.controllers;

import jakarta.servlet.http.HttpSession;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping("/t")
public class DashboardController {

    @GetMapping("/t/dashboard")
    public String dashboard(HttpSession session) {
        Authentication auth = SecurityContextHolder.getContext().getAuthentication();
        System.out.println("Logged in user: " + auth.getName());
        System.out.println("Authorities: " + auth.getAuthorities());
        return "dashboard";
    }

}
