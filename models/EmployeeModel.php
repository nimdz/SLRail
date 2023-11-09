<?php

require_once 'includes/database.php';

class EmployeeModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function registerEmployee($username,$password,  $full_name, $nic, $email, $position)
    {
        $conn = $this->db->getConnection();

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Employee (username, password, full_name, nic, email, position) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error: " . $conn->error);
        }

        $stmt->bind_param("ssssss", $username,  $password, $full_name, $nic, $email, $position);

        if ($stmt->execute()) {
            return true; // Registration successful
        } else {
            return false; // Registration failed
        }
    }
    public function loginEmployee($username, $password)
    {
        $conn = $this->db->getConnection();
    
        // Retrieve user data from the database for the given username
        $sql = "SELECT username, position, password FROM Employee WHERE username=?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            die("Error: " . $conn->error);
        }
    
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($retrievedUsername, $retrievedPosition, $hashedPassword);
    
        if ($stmt->fetch() && password_verify($password, $hashedPassword)) {
            // Return an associative array with the user's username and position
            return [
                'username' => $retrievedUsername,
                'position' => $retrievedPosition,
            ];
        }
    
        return false; // Login failed
    }

    public function logoutEmployee(){
      session_start();
      session_destroy();
    }
    

    
}
