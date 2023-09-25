<?php

// Define the base path of your application
define('BASE_PATH', dirname(__DIR__));
class PassengerModel {
    private $db;

    public function __construct() {
        // Include the database configuration
        require_once(BASE_PATH . '/database.php');

        // Create a new Database instance and establish a connection
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function registerPassenger($username, $full_name, $email, $password) {
        // Hash the password (you should use a stronger hashing method in production)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new passenger into the database
        $query = "INSERT INTO passenger (username, email, full_name, password) VALUES (:username, :email, :full_name, :password)";
        $stmt = $this->db->prepare($query);

        // Bind parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':password', $hashedPassword);

        // Execute the query
        if ($stmt->execute()) {
            return true; // Registration successful
        } else {
            return false; // Registration failed
        }
    }
}
?>