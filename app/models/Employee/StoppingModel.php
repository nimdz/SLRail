<?php

require_once ('app/includes/database.php');

class StoppingModel{


    private $db;

    public  function __construct(){
       $this->db=new Database();
    }

    public function getScheduleData(){
        
       $conn=$this->db->getConnection();

       $sql="SELECT ts.train_number, ts.departure_station, ts.destination_station, ts.schedule_id FROM train_schedules ts;";

       $stmt=$conn->prepare($sql);

       if($stmt == false){
        die("Error:".$conn->error);
        }
        $stmt->execute();
        
        $result = $stmt->get_result();
        $details = [];
        while ($row = $result->fetch_assoc()) {
            $details[] = $row;
        }

        return $details;
        }

        public function addStopping($scheduleId, $stationName, $arrivalTime, $departureTime){
            $conn = $this->db->getConnection();
        
            $sql = "INSERT INTO train_stoppings (schedule_id, station_name, arrival_time, departure_time) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
        
            if($stmt == false){
                die("Error:".$conn->error);
            }
        
            $stmt->bind_param("isss", $scheduleId, $stationName, $arrivalTime, $departureTime);
        
            if($stmt->execute()){
                return true; // Insertion successful
            } else {
                return false; // Insertion failed
            }
        }
        public function getStoppingsByScheduleId($scheduleId)
        {
            $conn = $this->db->getConnection();
    
            $sql = "SELECT stoppings FROM train_schedules WHERE schedule_id = ?;";
    
            $stmt = $conn->prepare($sql);
    
            if ($stmt == false) {
                die("Error:" . $conn->error);
            }
    
            $stmt->bind_param("i", $scheduleId);
            $stmt->execute();
    
            $result = $stmt->get_result();
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return explode(',', $row['stoppings']);
            }
    
            return [];
        }
        public function getStoppings($scheduleId) {
            $conn = $this->db->getConnection();
            
            $sql = "SELECT stopping_id, station_name, arrival_time, departure_time FROM train_stoppings WHERE schedule_id = ?";
            
            $stmt = $conn->prepare($sql);
            
            if ($stmt === false) {
                die("Error: " . $conn->error);
            }
            
            $stmt->bind_param("i", $scheduleId);
            
            $stmt->execute();
            
            $result = $stmt->get_result();
            
            $stoppings = [];
            while ($row = $result->fetch_assoc()) {
                $stoppings[] = $row;
            }
            
            return $stoppings;
        }
        public function updateStopping($stoppingId, $stationName, $arrivalTime, $departureTime){
            $conn = $this->db->getConnection();
            $sql = "UPDATE train_stoppings SET station_name = ?, arrival_time = ?, departure_time = ? WHERE stopping_id = ?";
            $stmt = $conn->prepare($sql);
            if($stmt === false){
                die("Error: " . $conn->error);
            }
            $stmt->bind_param("sssi", $stationName, $arrivalTime, $departureTime, $stoppingId);
            if($stmt->execute()){
                return true; // Update successful
            } else {
                return false; // Update failed
            }
        }
    
        public function deleteStopping($stoppingId){
            $conn = $this->db->getConnection();
            $sql = "DELETE FROM train_stoppings WHERE stopping_id = ?";
            $stmt = $conn->prepare($sql);
            if($stmt === false){
                die("Error: " . $conn->error);
            }
            $stmt->bind_param("i", $stoppingId);
            if($stmt->execute()){
                return true; // Deletion successful
            } else {
                return false; // Deletion failed
            }
        }
        
}