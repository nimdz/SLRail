<?php

require_once 'app/includes/database.php';

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

    public function tdaddAnnouncement($title,$description)
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

    public function getAnnouncementById($annId)
    {
        $conn = $this->db->getConnection();

        $sql = "SELECT * FROM announcement WHERE ann_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error: " . $conn->error);
        }

        $stmt->bind_param('i', $annId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function updateAnnouncement($annId,$title,$description)
    {
        $conn = $this->db->getConnection();

        $sql = "UPDATE announcement SET title=?, description=? WHERE ann_id=?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error: " . $conn->error);
        }

        $stmt->bind_param("ssi",$title,$description,$annId);

        if ($stmt->execute()) {
            return true; // Announcement update successful
        } else {
            return false; // Announcement update failed
        }
    }

    public function deleteAnnouncement($annId)
    {
        $conn = $this->db->getConnection();

        $sql = "DELETE FROM announcement WHERE ann_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error: " . $conn->error);
        }

        $stmt->bind_param("i", $annId);

        if ($stmt->execute()) {
            return true; // Schedule deletion successful
        } else {
            return false; // Schedule deletion failed
        }
    }
}




?>