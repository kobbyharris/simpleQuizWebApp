package com.vehicletrackingsys.api.models;

import jakarta.persistence.*;

import java.time.LocalDateTime;
import java.util.UUID;

@Entity
public class Tracking {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private UUID id;

    @ManyToOne
    @JoinColumn(name = "vehicle_id", referencedColumnName = "id")
    private Vehicle vehicle;

    private String gpsDeviceId;

    private double latitude;

    private double longitude;

    @Enumerated(EnumType.STRING)
    private TrackingStatus status;

    private LocalDateTime timestamp = LocalDateTime.now();

    public enum TrackingStatus {
        MOVING,
        IDLE,
        PARKED
    }


}
