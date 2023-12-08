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

          // Perform form validation
        if (!$this->validateForm($username, $password, $full_name, $email)) 
          {
            return false; // Validation failed
        }
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

    private function validateForm($username,$password,$full_name,$email){

       if(empty($username) || empty($password) || empty($full_name) || empty($email)){
             return false;
       }
       if (strlen($password) < 8) {
        // Password must be at least 8 characters
        return false;
       }
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email format
        return false;
      }

      return true; // All validation passed


    
    }
public function resetPassword($username, $newPassword)
{
    $conn = $this->db->getConnection();

    // Check if the username exists
    $sql_select = "SELECT id FROM passenger WHERE username=?";
    $stmt_select = $conn->prepare($sql_select);

    if ($stmt_select === false) {
        return "Error: " . $conn->error;
    }

    $stmt_select->bind_param("s", $username);
    $stmt_select->execute();
    $stmt_select->bind_result($id);

    // Fetch the result
    $fetchResult = $stmt_select->fetch();

    // Close the statement
    $stmt_select->close();

    if ($fetchResult) {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password in the database
        $sql_update = "UPDATE passenger SET password=? WHERE username=?";
        $stmt_update = $conn->prepare($sql_update);

        if ($stmt_update === false) {
            return "Error: " . $conn->error;
        }

        $stmt_update->bind_param("ss", $hashedPassword, $username);

        if ($stmt_update->execute()) {
            $stmt_update->close();
            return true;
        } else {
            $stmt_update->close();
            return "Error updating password: " . $stmt_update->error;
        }
    } else {
        // Username does not exist
        return "Username not found";
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
