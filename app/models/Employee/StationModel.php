<?php

require_once 'app/includes/database.php';

class StationModel{


    private $db;

    public function __construct(){
        $this->db=new Database();
    }

    public function createStation($station_name,$lineId){
     
        $conn=$this->db->getConnection();

        $sql="INSERT INTO Stations(station_name,lineID) VALUES(?,?)";
        $stmt=$conn->prepare($sql);

        if($stmt == false){
                  die("Error:".$conn->error);
        }
        $stmt->bind_param("si",$station_name,$lineId);

        if($stmt->execute()){
              return true;
        }else{
            return false;
        }
    
    }
    public function getStations(){

        $conn=$this->db->getConnection();
        // Initialize an empty array to store station data
        $stations = [];
    
        // Assuming $conn is your database connection
        $sql = "SELECT station_id, station_name FROM Stations";
        $result = $conn->query($sql);
    
        // Check if query was successful
        if ($result) {
            // Fetch station data
            while ($row = $result->fetch_assoc()) {
                $stations[] = $row;
            }
        } else {
            // Handle query error if needed
            return false;
        }
    
        return $stations;
    }
    
    public function getStationsByLineId($lineId) {
        $conn=$this->db->getConnection();
        $sql="SELECT * FROM Stations WHERE lineID = ?";
        $stmt=$conn->prepare($sql);

        if($stmt == false){
            die("Error:".$conn->error);
        }
        $stmt->bind_param("i", $lineId);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $stations = [];
        while ($row = $result->fetch_assoc()) {
            $stations[] = $row;
        }

        return $stations;
    }
    public function updateStation($station_id, $station_name, $lineId) {
        $conn = $this->db->getConnection();

        $sql = "UPDATE Stations SET station_name = ?, lineID = ? WHERE station_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt == false) {
            die("Error:" . $conn->error);
        }

        $stmt->bind_param("sii", $station_name, $lineId, $station_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteStation($station_id) {
        $conn = $this->db->getConnection();

        $sql = "DELETE FROM Stations WHERE station_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt == false) {
            die("Error:" . $conn->error);
        }

        $stmt->bind_param("i", $station_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getDataForAssignSM(){

        $conn = $this->db->getConnection();
    
        // Fetch station data
        $stations = [];
        $sqlStations = "SELECT station_id, station_name FROM Stations";
        $resultStations = $conn->query($sqlStations);
        if ($resultStations) {
            while ($row = $resultStations->fetch_assoc()) {
                $stations[] = $row;
            }
        } else {
            // Handle query error if needed
            return false;
        }
    
        // Fetch employee data
        $employees = [];
        $sqlEmployees = "SELECT employee_id, username FROM Employee WHERE position = 1";
        $resultEmployees = $conn->query($sqlEmployees);
        if ($resultEmployees) {
            while ($row = $resultEmployees->fetch_assoc()) {
                $employees[] = $row;
            }
        } else {
            // Handle query error if needed
            return false;
        }
    
        return [
            'stations' => $stations,
            'employees' => $employees
        ];
    }

    public function AssignSm($station_name,$employee_id){

        $conn=$this->db->getConnection();

        $sql="INSERT INTO assign_station(station_name,employee_id) VALUES(?,?)";
        $stmt=$conn->prepare($sql);

        if($stmt == false){
             die("Error:".$conn->error);
        }

        $stmt->bind_param("si",$station_name,$employee_id);

        if($stmt->execute()){
            return true;
        }else{
           return false;
        }
    
    
    }
    
    
    

}