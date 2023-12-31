<?php

require_once 'app/includes/database.php';
class TrainLocationModel{

     private $db;

     public function __construct(){
         
        $this->db=new Database();
        
    }

    public function addLocation($train_number,$current_city,$last_updated){

        $conn=$this->db->getConnection();

        $sql="INSERT INTO train_location(train_number,current_city,last_updated) VALUES(?,?,?)";
        $stmt=$conn->prepare($sql);

        if($stmt==false){
            die("Error:".$conn->error);
        }
        $stmt->bind_param("iss",$train_number,$current_city,$last_updated);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    
    
    }

    public function getLocation($train_number){

        $conn=$this->db->getConnection();

        $sql = "SELECT train_number, current_city, DATE_FORMAT(last_updated, '%h:%i %p') as last_updated_time FROM train_location WHERE train_number = ?";
        $stmt=$conn->prepare($sql);

        if ($stmt === false) {
            die("Error:" . $conn->error);
        }
    
        $stmt->bind_param("i", $train_number);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $data = [];
    
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    
        return $data;

    
    
    }
} 