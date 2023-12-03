<?php

require_once 'includes/database.php';

class AnnouncementModel{
    
    private $db;

    public function __construct()
    {
         $this->db =new Database();
        
    }

    public function addAnnouncement($title,$description)
    {
      
        $conn=$this->db->getConnection();

        $sql="INSERT INTO announcement(title,description) VALUES(?,?)";
        $stmt=$conn->prepare($sql);

        if($stmt === false){
           die("Error:". $conn->error);
        }
        $stmt->bind_param("ss",$title,$description);

        if($stmt->execute()){
           return true;
        }else{
           return false;
        }
    
    }
    /*public function addAnnouncement($title, $description)
{
    $conn = $this->db->getConnection();

    // Include 'created_at' in the SQL query
    $sql = "INSERT INTO announcement(title, description, created_at) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error:" . $conn->error);
    }
    
    $stmt->bind_param("ss", $title, $description);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}*/


    public function getAnnouncement(){
        
        $conn=$this->db->getConnection();

        $sql="SELECT * FROM announcement";
        $result=$conn->query($sql);

        $announcement=array();

        While($row=$result->fetch_assoc()){
            $announcement[]=$row;
        }
       return $announcement;
    }
}




?>