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
    public function loginPassenger($username,$password){
       
        $conn=$this->db->getConnection();

        //retrive password from database
        $sql="SELECT password from passenger WHERE username=?";
        $stmt=$conn->prepare($sql);

        if($stmt===false){
           die("Error:".$conn->error);
        }

        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt->bind_result($hashedPassword);

        if($stmt->fetch()){
            if(password_verify($password,$hashedPassword)){
                return true;//Login Sucess
            }
        }
        return false;//Login Fail
    }

}
?>
