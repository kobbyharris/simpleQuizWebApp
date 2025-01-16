package com.vehicletrackingsys.api.services;

import com.vehicletrackingsys.api.dtos.UserDTO;
import com.vehicletrackingsys.api.models.Role;
import com.vehicletrackingsys.api.models.User;
import com.vehicletrackingsys.api.repositories.RoleRepository;
import com.vehicletrackingsys.api.repositories.UserRepository;
import jakarta.transaction.Transactional;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Service;

import java.util.Optional;
import java.util.UUID;

@Service
public class UserService {

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private RoleRepository roleRepository;

    @Autowired
    private BCryptPasswordEncoder passwordEncoder;


    @Transactional
    public UserDTO registerUser(UserDTO userDTO, String password) {
        // Check if the user already exists
        Optional<User> existingUser = userRepository.findByEmail(userDTO.getEmail());
        if (existingUser.isPresent()) {
            throw new IllegalStateException("User with this email already exists.");
        }

        // Create the new user object
        User user = new User();
        user.setUsername(userDTO.getUsername());
        user.setEmail(userDTO.getEmail());
        user.setPassword(passwordEncoder.encode(password));

        // Save the user to generate the UUID
        User savedUser = userRepository.save(user);

        // Create a role and associate the role with the user UUID
        Role role = new Role();
        role.setRoleName("USER");  // Set the default role name as "USER"
        roleRepository.save(role);  // Save the role to get its ID

        savedUser.setRole(role);  // Set the role of the user

        // Save the updated user with the role assigned
        userRepository.save(savedUser);

        // Return the registered user details (including role)
        UserDTO registeredUserDTO = new UserDTO();
        registeredUserDTO.setId(savedUser.getId());
        registeredUserDTO.setUsername(savedUser.getUsername());
        registeredUserDTO.setEmail(savedUser.getEmail());
        registeredUserDTO.setRoleName(role.getRoleName());
        return registeredUserDTO;
    }



    public boolean userExistsByEmail(String email) {
        return userRepository.findByEmail(email).isPresent();
    }

    public UserDTO authenticateUser(String email, String password) {
        Optional<User> userOptional = userRepository.findByEmail(email);
        if (userOptional.isPresent()) {
            User user = userOptional.get();
            if (passwordEncoder.matches(password, user.getPassword())) {
                // Directly access the user's role (no need to fetch it from the role repository)
                Role role = user.getRole(); // Role is already mapped in the User object

                // Map to UserDTO
                UserDTO authenticatedUser = new UserDTO();
                authenticatedUser.setId(user.getId());
                authenticatedUser.setUsername(user.getUsername());
                authenticatedUser.setEmail(user.getEmail());
                authenticatedUser.setRoleName(role != null ? role.getRoleName() : "USER"); // Default to "USER" if role is null
                return authenticatedUser;
            }
        }
        return null; // Invalid credentials
    }

}
