<?php

require_once 'app/includes/database.php';

class StationModel{

  private $db;

  public function __construct(){
     $this->db=new Database();
  
    }

    public function getStationNames() {
        $conn = $this->db->getConnection();
        $sql = "SELECT StationName FROM Stations";
        $result = $conn->query($sql);
    
        if ($result === false) {
            die("Error: " . $conn->error);
        }
    
        $stationNames = [];
        while ($row = $result->fetch_assoc()) {
            $stationNames[] = $row['StationName'];
        }
    
        return $stationNames;
    }
    

}