<?php

require_once 'app/includes/database.php';
class TrainLocationModel{

     private $db;

     public function __construct(){
         
        $this->db=new Database();
        
    }

    public function addLocation($train_number, $latitude, $longitude)
    {
        $conn = $this->db->getConnection();

        $sql = "INSERT INTO train_location(train_number, latitude, longitude) VALUES(?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if($stmt === false){
            die("Error:". $conn->error);
         }
         $stmt->bind_param("idd",$train_number, $latitude, $longitude);
 
         if($stmt->execute()){
            return true;
         }else{
            return false;
         }
     
    }
    public function getTrainData(){
        
        $conn=$this->db->getConnection();
 
        $sql="SELECT ts.train_number, ts.departure_station, ts.destination_station FROM train_schedules ts
               INNER JOIN train_location tl WHERE tl.train_number=ts.train_number ;";
 
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
    
        public function getAllTrainInfo(){
             
            $conn=$this->db->getConnection();

            $sql="SELECT train_number,departure_station,destination_station FROM train_schedules;";

            $stmt=$conn->prepare($sql);

            if($stmt == false){
               die("Error:".$conn->error);
            }
            $stmt->execute();

            $result=$stmt->get_result();
            $details=[];
            while($row = $result->fetch_assoc()){
                   $details[]=$row;
            }

            return $details;

        
        
        }


    public function getLocation($train_number)
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT tl.train_number, tl.latitude, tl.longitude, TIME_FORMAT(tl.last_updated, '%h:%i %p') as last_updated_time,
                        ts.departure_station, ts.destination_station,
                        TIME_FORMAT(ts.departure_time, '%h:%i %p') as departure_time, 
                        TIME_FORMAT(ts.arrival_time, '%h:%i %p') as arrival_time
                FROM train_location tl
                JOIN train_schedules ts ON tl.train_number = ts.train_number
                WHERE tl.train_number = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error:" . $conn->error);
        }

        $stmt->bind_param("i", $train_number);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];

        while ($row = $result->fetch_assoc()) {
            // Get the city name for each location
            $city = $this->getCityName($row['latitude'], $row['longitude']);
            // Append the city name to the result
            $row['city'] = $city;
            $data[] = $row;
        }

        return $data;
    }

    private function getCityName($latitude, $longitude)
    {
        // GeoNames API endpoint
        $apiEndpoint = 'http://api.geonames.org/findNearbyJSON?lat=' . $latitude . '&lng=' . $longitude;
    
        // Fetch data from the GeoNames API
        $response = file_get_contents($apiEndpoint);
    
        // Check if the response is not empty and contains valid JSON
        if ($response !== false) {
            // Decode JSON response
            $data = json_decode($response, true);
    
            // Check if data contains valid results
            if (isset($data['geonames']) && !empty($data['geonames'])) {
                // Extract city name from the first result
                $cityName = $data['geonames'][0]['name'];
                return $cityName;
            }
        }
    
        return " City";
    }

    
    

} 