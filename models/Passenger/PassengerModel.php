<?php

require_once 'includes/database.php';
class PassengerModel
{

   
    private $db;

    public function __construct()
    {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    public function registerPassenger($username, $password, $full_name, $email)
    {
        $conn = $this->db->getConnection();

        // Hash the password for security
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the 'passenger' table, excluding the 'id' column
        $sql = "INSERT INTO passenger (username, password, full_name, email) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error: " . $conn->error);
        }

        $stmt->bind_param("ssss", $username, $password, $full_name, $email);

        if ($stmt->execute()) {
            return true; // Registration successful
        } else {
            return false; // Registration failed
        }
    }
    public function loginPassenger($username, $password)
    {
        $conn = $this->db->getConnection();
    
        // Retrieve user data from the database for the given username
        $sql = "SELECT id, username,full_name,email, password FROM passenger WHERE username=?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            die("Error: " . $conn->error);
        }
    
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($id, $retrievedUsername,$full_name,$email, $hashedPassword);
    
        $id = null; // Initialize the variable
        $retrievedUsername = null; // Initialize the variable
        $full_name = null;
    
        if ($stmt->fetch() && password_verify($password, $hashedPassword)) {
            // Return an associative array with the user's ID and username
            return ['id' => $id, 'username' => $retrievedUsername,
                    'full_name'=>$full_name ,'email'=>$email];
        }
    
        return false; // Login failed
    }
    
    public function getPassengerDetails($id){
      
        $conn=$this->db->getConnection();

        $sql="SELECT id,username,full_name,email FROM passenger WHERE id=?";
        $stmt=$conn->prepare($sql);

        if($stmt=== false){
           die("Error: ".$conn->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($id,$username,$full_name,$email);
    
        if($stmt->fetch()){
           return[
              "id"=>$id,
              "username"=> $username,
              "full_name"=>$full_name,
              "email"=> $email,
           ];
        }
        return false;
    }

    public function updatePassenger($user_id, $full_name, $email){
        $conn=$this->db->getConnection();
    
        $sql="UPDATE passenger SET full_name=?, email=? WHERE id=?";
        $stmt=$conn->prepare($sql);
    
        if($stmt===false){
            die("Error:". $conn->error);
        }
    
        $stmt->bind_param("ssi", $full_name, $email, $user_id); 
    
        if($stmt->execute()){
            return true; // Update successful
        }else{
            return false; // Update fail
        }
    }

    public function getAllPassengers()
    {
        $conn = $this->db->getConnection();
    
        $sql = "SELECT * FROM passenger";
        $result = $conn->query($sql);
    
        $passengers = array();
        while ($row = $result->fetch_assoc()) {
            $passengers[] = $row;
        }
    
        return $passengers;
    }
    

    public function logoutPassenger(){
         
        session_start();
        session_destroy();
      
    }
    

}
?>
