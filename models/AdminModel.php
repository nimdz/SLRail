<?php

require_once 'includes/database.php';
class AdminModel
{

   
    private $db;

    public function __construct()
    {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

   
    public function loginAdmin($username, $password)
    {
        $conn = $this->db->getConnection();
    
        // Retrieve user data from the database for the given username
        $sql = "SELECT username, password FROM admin WHERE username=?";
        $stmt = $conn->prepare($sql);
    
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
    
        return false; // Login failed
    }
    
    
    

    public function logoutAdmin(){
         
        session_start();
        session_destroy();
      
    }
    

}
?>