<?php

require_once 'app/includes/database.php';

class AdminModel{
    
    private $db;

    public function __construct(){

        $this->db = new Database();
    }

    public function login($username, $password){
       $conn=$this->db->getConnection();

       $sql="SELECT username,password from Admin WHERE username=?";
       $stmt=$conn->prepare($sql);
           if ($stmt === false) {
            die("Error: " . $conn->error);
        }
    
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($retrievedUsername, $storedPassword);
    
        $retrievedUsername = null; // Initialize the variable
    
        if ($stmt->fetch() && $password == $storedPassword) {
            // Return the retrieved username
            return $retrievedUsername;
        }
    
        return false; // Login faile
     
    }

    public function getEmployeeCount()
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT COUNT(*) AS employee_count FROM Employee";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['employee_count'];
    }

    public function getPassengerCount()
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT COUNT(*) AS passenger_count FROM passenger";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['passenger_count'];
    }

    public function getTrainCount()
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT COUNT(*) AS train_count FROM train";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['train_count'];
    }
    public function getStationCount()
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT COUNT(*) AS station_count FROM Stations";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['station_count'];
    }



    public function logout(){
       session_start();
       session_destroy();
    }
}