<?php

require_once 'app/includes/database.php';

class AdminModel{
    
    private $db;

    public function __construct(){

        $this->db = new Database();
    }

    public function login($username, $password){

       session_start();

       $conn=$this->db->getConnection();

       $sql="SELECT admin_id,username,password from Admin WHERE username=?";
       $stmt=$conn->prepare($sql);
           if ($stmt === false) {
            die("Error: " . $conn->error);
        }
    
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($admin_id,$retrievedUsername, $storedPassword);
    
        $admin_id=null;
        $retrievedUsername = null; // Initialize the variable
    
        if ($stmt->fetch() && $password == $storedPassword) {
            // Return the retrieved username

           return['admin_id' =>$admin_id,'username'=>$retrievedUsername];
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

    public function profile($admin_id){
        $conn = $this->db->getConnection();
        $sql = "SELECT username, email, nic FROM Admin WHERE admin_id=?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Error: " . $conn->error);
        }
        $stmt->bind_param("i", $admin_id); // Assuming admin_id is an integer
        $stmt->execute();
        $stmt->bind_result($username, $email, $nic);
        $stmt->fetch();
        
        $profile = array(
            "username" => $username,
            "email" => $email,
            "nic" => $nic
        );
    
        return $profile;
    }
    public function updateEmployee($employee_id, $full_name, $email, $nic, $username)
    {
        $conn = $this->db->getConnection();
    
        $sql = "UPDATE Employee SET full_name=?, email=?, nic=?, username=? WHERE employee_id=?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            die("Error: " . $conn->error);
        }
    
        $stmt->bind_param("ssssi", $full_name, $email, $nic, $username, $employee_id);
    
        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update fail
        }
    } public function updateAdmin($admin_id,$email, $nic, $username)
    {
        $conn = $this->db->getConnection();
    
        $sql = "UPDATE Admin SET  email=?, nic=?, username=? WHERE admin_id=?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            die("Error: " . $conn->error);
        }
    
        $stmt->bind_param("sssi",  $email, $nic, $username, $admin_id);
    
        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update fail
        }
    }    



    public function logout(){
       session_start();
       session_destroy();
    }
}