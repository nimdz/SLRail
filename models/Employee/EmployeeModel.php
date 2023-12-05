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
        $sql = "SELECT employee_id,username, position, password FROM Employee WHERE username=?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            die("Error: " . $conn->error);
        }
    
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($employee_id,$retrievedUsername, $retrievedPosition, $hashedPassword);
    
        if ($stmt->fetch() && password_verify($password, $hashedPassword)) {

             // Store employee_id in session
             session_start();
             $_SESSION['employee_id'] = $employee_id;
            // Return an associative array with the user's username and position
            return [
                'username' => $retrievedUsername,
                'position' => $retrievedPosition,
            ];
        }
    
        return false; // Login failed
    }
    public function getEmployeeDetails($employee_id){

        $conn=$this->db->getConnection();

        $sql="SELECT employee_id,full_name,username,email,nic  FROM Employee WHERE employee_id=?";
        $stmt=$conn->prepare($sql);

        if($stmt=== false){
            die("Error: ".$conn->error);
         }
 
         $stmt->bind_param("i", $employee_id);
         $stmt->execute();
         $stmt->bind_result($employee_id,$full_name,$username,$email,$nic);
     
         if($stmt->fetch()){
            return[
               "employee_id"=>$employee_id,
               "full_name"=>$full_name,
               "username"=> $username,
               "email"=> $email,
               "nic" =>$nic,
            ];
         }
         return false;
    
    
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
    }
    
    public function getAllEmployees()
    {
        $conn = $this->db->getConnection();
    
        $sql = "SELECT * FROM Employee";
        $result = $conn->query($sql);
    
        $employees = array();
        while ($row = $result->fetch_assoc()) {
            $employees[] = $row;
        }
    
        return $employees;
    }
    
    public function logoutEmployee(){
      session_start();
      session_destroy();
    }
    

    
}
