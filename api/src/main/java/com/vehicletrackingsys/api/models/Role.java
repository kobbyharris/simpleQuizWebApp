package com.vehicletrackingsys.api.models;

import jakarta.persistence.*;
import java.util.UUID;

@Entity
public class Role {
    @Id
    @Column(length = 36, unique = true)
    private String id;  // Change UUID to String

    private String roleName;

    @PrePersist
    private void generateUUID() {
        if (this.id == null) {
            this.id = UUID.randomUUID().toString();  // Manually generate UUID as String
        }
    }

    // Getters and Setters
    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getRoleName() {
        return roleName;
    }

    public void setRoleName(String roleName) {
        this.roleName = roleName;
    }
}
