<?php
 
 require_once 'app/models/Employee/TrainLocationModel.php';
 require_once 'app/models/Employee/TrainModel.php';


 class TrainLocationController {
    private $model;

    public function __construct() {
        $this->model = new TrainLocationModel();
    }


    public function load(){

        session_start();

        $trainModel=new TrainModel();
    
        $employee_id=isset($_GET["employee_id"]) ? $_GET["employee_id"] : null;
    
        // Debug: Output the employee ID
        //echo "Employee ID: " . $employee_id . "<br>";
    
        $trains=$trainModel->getAssignedTrains($employee_id);

        include('app/views/TrainDriver/location_share.php');
    
    }
    public function shareLocation() {

        session_start();
        // Get JSON data from the request body
        $data = json_decode(file_get_contents('php://input'), true);

        // Check if the required data is received
        if(isset($data['latitude']) && isset($data['longitude']) && isset($data['trainNumber'])) {
            
            $train_number = $data['trainNumber'];
            $latitude = $data['latitude'];
            $longitude = $data['longitude'];
            

            // Create an instance of TrainLocationModel
            $trainLocationModel = new TrainLocationModel();

            // Add the location
            if($trainLocationModel->addLocation($train_number, $latitude, $longitude)) {
                echo "Train location shared successfully!";
            } else {
                echo "Error sharing train location.";
            }
        } else {
            echo "Incomplete data received.";
        }
}

public function location_form(){

        $locationModel=new TrainLocationModel();
        $trains=$locationModel->getTrainData();
        include('app/views/Passenger/location_search.php');
   
}
public function sm_location_form(){

    $locationModel=new TrainLocationModel();
    $trains=$locationModel->getTrainData();
    include('app/views/StationMaster/sm_track_location.php');

}
public function view(){
    
    session_start();

    $train_number=$_POST['train_number'];

    $trainlocationModel=new TrainLocationModel();

    $trainLocation=$trainlocationModel->getLocation($train_number);

    if (!empty($trainLocation)) {
        // Display the train location details
        include('app/views/Passenger/live_location_view.php');

      } else {
        echo "Train location not found.";
    }
}
public function sm_view(){
    
    session_start();

    $train_number=$_POST['train_number'];

    $trainlocationModel=new TrainLocationModel();

    $trainLocation=$trainlocationModel->getLocation($train_number);

    if (!empty($trainLocation)) {
        // Display the train location details
        include('app/views/StationMaster/sm_view_location.php');

      } else {
        echo "Train location not found.";
    }
}

}

?>