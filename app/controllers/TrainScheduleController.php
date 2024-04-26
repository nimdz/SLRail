<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once 'app/models/Employee/StationModel.php';
require_once 'app/models/Employee/TrainScheduleModel.php';

class TrainScheduleController
{

        private function requireAuth() {
            session_start();
            if (!isset($_SESSION['user_id'])) {
                echo '<script>alert("You need to log in to access this page.");</script>';
                echo '<script>window.location.href = "/SlRail/home/login";</script>';
                exit();
            }
        }
       
        public function searchSchedule(){
             
            $this->requireAuth();

            $stationModel=new StationModel();
            $stations=$stationModel->getStations();

            $data['stations']=$stations;

            include('app/views/Passenger/search_schedules.php');
         
        }
        public function filter(){
            
            $this->requireAuth();

            $departure_station = isset($_GET["departure_station"]) ? $_GET["departure_station"] : '';
            $destination_station = isset($_GET["destination_station"]) ? $_GET["destination_station"] : '';
            $departure_date = isset($_GET["departure_date"]) ? $_GET["departure_date"] : '';


            $searchModel=new TrainScheduleModel();
            $availabletrains=$searchModel->getTrains_booking($departure_station,$destination_station,$departure_date);
            if($availabletrains){
                include('app/views/Passenger/train_schedule.php');
            }else{
                        echo "No Train Availble!.";
                }
    }

    public function getTrains_route(){

        $this->requireAuth();

        if(isset($_GET['route'])){

            // Debug code to check the GET parameter
            // echo '<pre>';
            // var_dump($_GET);
            // echo '</pre>';

            $route=$_GET['route'];

            $trainmodel=new TrainScheduleModel();
            $result=$trainmodel->getAllSchedules($route);

            // Debug code to check if trains are fetched
            //  echo '<pre>';
            //  var_dump($result);
            //  echo '</pre>';

            if($result){
                include('app/views/Passenger/available_trains_line.php');
            }else{
                echo "No Train Available For this Route";
            }
        
    
    }
    }
    public function stoppings(){

        $this->requireAuth();

        $train_number=isset($_GET["train_number"]) ? $_GET["train_number"] : '';

        $scheduleModel=new TrainScheduleModel();
        $stoppings=$scheduleModel->showStoppings($train_number);

        if($stoppings){
            include('app/views/Passenger/train_stoppings.php');
        }else{
            echo "Stoppings Details Not Available";
        }


    }
    public function loadForm(){

        $this->requireAuth();

        $scheduleModel=new StationModel();
        $stations=$scheduleModel->getStations();
        $data['stations'] =$stations;

        include('app/views/Admin/schedule_form.php');
    
    }
    public function addSchedule()
    {

        $this->requireAuth();
    
        // Retrieve data from the schedule form
        $departure_station = $_POST["departure_station"];
        $destination_station = $_POST["destination_station"];
        $departure_time = $_POST["departure_time"];
        $arrival_time = $_POST["arrival_time"];
        $train_number = $_POST["train_number"];
        $train_type = $_POST["train_type"];
    
        // Convert array of stoppings into a comma-separated string
// Convert array of stoppings into a comma-separated string in reverse order
        $stoppings = implode(", ", array_reverse($_POST["stoppings"]));
    
        // Convert checkbox values to 1 if checked, 0 if unchecked
        $monday = isset($_POST["monday"]) ? 1 : 0;
        $tuesday = isset($_POST["tuesday"]) ? 1 : 0;
        $wednesday = isset($_POST["wednesday"]) ? 1 : 0;
        $thursday = isset($_POST["thursday"]) ? 1 : 0;
        $friday = isset($_POST["friday"]) ? 1 : 0;
        $saturday = isset($_POST["saturday"]) ? 1 : 0;
        $sunday = isset($_POST["sunday"]) ? 1 : 0;
    
        $route=$_POST["route"];
    
        // Debug: Print $_POST variables
        // echo '<script>';
        // echo 'console.log(' . json_encode($_POST) . ');';
        // echo '</script>';
    
        // // Debug: Print the values of variables
        // echo "Departure Station: " . $departure_station . "<br>";
        // echo "Destination Station: " . $destination_station . "<br>";
        // echo "Departure Time: " . $departure_time . "<br>";
        // echo "Arrival Time: " . $arrival_time . "<br>";
        // echo "Train Number: " . $train_number . "<br>";
        // echo "Train Type: " . $train_type . "<br>";
        // echo "Stoppings: " . $stoppings . "<br>";
        // echo "Monday: " . $monday . "<br>";
        // echo "Tuesday: " . $tuesday . "<br>";
        // echo "Wednesday: " . $wednesday . "<br>";
        // echo "Thursday: " . $thursday . "<br>";
        // echo "Friday: " . $friday . "<br>";
        // echo "Saturday: " . $saturday . "<br>";
        // echo "Sunday: " . $sunday . "<br>";
        // echo "Route: " . $route . "<br>";
    
        // Create an instance of the TrainScheduleModel
        $scheduleModel = new TrainScheduleModel();
    
        // Create a new train schedule
        $scheduleResult = $scheduleModel->createSchedule(
            $departure_station,
            $destination_station,
            $departure_time,
            $arrival_time,
            $train_number,
            $train_type,
            $stoppings,
            $monday,
            $tuesday,
            $wednesday,
            $thursday,
            $friday,
            $saturday,
            $sunday,
            $route
        );
    
        if ($scheduleResult) {
            // Schedule creation successful
            echo '<script>alert("Schedule Created Successfully!"); window.location.href = "/SlRail/admin/dashboard";</script>';
            exit();
        } else {
            echo '<script>alert("Error: Schedule creation failed.");</script>';
        }
    }
    

    public function viewSchedules()
    {

        $this->requireAuth();

        $scheduleModel = new TrainScheduleModel();

        // Retrieve all train schedules
        $schedules = $scheduleModel->getSchedules();

        include('app/views/StationMaster/allschedules.php');
    }
    public function adviewSchedules()
    {
        // Create an instance of TrainScheduleModel
        $scheduleModel = new TrainScheduleModel();

        // Retrieve all train schedules
        $schedules = $scheduleModel->getSchedules();

        // Load the view for displaying schedules
        include('app/views/Admin/all_schedules.php');
    }
    public function tdviewSchedules()
    {

        $this->requireAuth();

        $scheduleModel = new TrainScheduleModel();

        // Retrieve all train schedules
        $schedules = $scheduleModel->getSchedules();


         // Load the view for displaying schedules
         include('app/views/TrainDriver/td_allschedules.php');
       
    }
    public function loadupdateForm(){
           
        $this->requireAuth();

        // Get train_number from the URL parameter
        $scheduleId = isset($_GET['schedule_id']) ? $_GET['schedule_id'] : null;

        // Create an instance of the TrainModel
         $scheduleModel=new TrainScheduleModel();

        // Get the details of the train by its train number
        $result = $scheduleModel->getScheduleById($scheduleId);

        if ($result) {
            // Pass the train details to the view
            include('app/views/Admin/schedule_update_form.php');
        } else {
            // Train not found, handle error
            echo "Error: Schedule not found.";
        }    
    }

    public function updateSchedule()
    {

        $this->requireAuth();

        $scheduleId = $_GET['schedule_id'];
        $departureStation = $_POST["departure_station"];
        $destinationStation = $_POST["destination_station"];
        $departureTime = $_POST["departure_time"];
        $arrivalTime = $_POST["arrival_time"];
        $trainNumber = $_POST["train_number"];
        $trainType = $_POST["train_type"];

        // Convert array of stoppings into a comma-separated string
        $stoppings = implode(", ", $_POST["stoppings"]);

        // Get days from the form
        $monday = isset($_POST["monday"]) ? 1 : 0;
        $tuesday = isset($_POST["tuesday"]) ? 1 : 0;
        $wednesday = isset($_POST["wednesday"]) ? 1 : 0;
        $thursday = isset($_POST["thursday"]) ? 1 : 0;
        $friday = isset($_POST["friday"]) ? 1 : 0;
        $saturday = isset($_POST["saturday"]) ? 1 : 0;
        $sunday = isset($_POST["sunday"]) ? 1 : 0;

        $route=$_POST["route"];
    
        // Create an instance of the TrainScheduleModel
        $scheduleModel = new TrainScheduleModel();

        $scheduleResult = $scheduleModel->updateSchedule(
            $scheduleId,
            $departureStation,
            $destinationStation,
            $departureTime,
            $arrivalTime,
            $trainNumber,
            $trainType,
            $stoppings,
            $monday,
            $tuesday,
            $wednesday,
            $thursday,
            $friday,
            $saturday,
            $sunday,
            $route
        );

        if ($scheduleResult) {
            // Schedule update successful
            echo '<script>alert("Schedule Updated Successfully!"); window.location.href = "/SlRail/admin/dashboard";</script>';
            exit();
        } else {
            echo "Error: Schedule update failed.";
        }
    }

    public function deleteSchedule()
    {

        $this->requireAuth();

        if (isset($_GET['schedule_id'])) {
            $scheduleId = $_GET['schedule_id'];
            //echo "Schedule ID from URL: $scheduleId";

            // Validate and process $scheduleId as needed

            // Create an instance of TrainScheduleModel
            $scheduleModel = new TrainScheduleModel();

            $scheduleResult=$scheduleModel->deleteSchedule($scheduleId);

            if ($scheduleResult) {
                // Deletion successful
                echo '<script>alert("Schedule Deleted Successfully!"); window.location.href = "/SlRail/admin/dashboard";</script>';
                exit();
            } else {
                echo 'Error: Deletion failed.';
            }
        }
    }
    public function toviewSchedules()
    {

        $this->requireAuth();

        $scheduleModel = new TrainScheduleModel();

        // Retrieve all train schedules
        $schedules = $scheduleModel->getSchedules();


         // Load the view for displaying schedules
         include('app/views/TicketingOfficer/to_allschedules.php');
       
    }
    public function getStationsByRoute()
{

    $this->requireAuth();

    if(isset($_GET['route'])) {
        $route = $_GET['route'];
        // Call the model method to retrieve stations
        $trainmodel=new TrainScheduleModel();

        $stations = $trainmodel->getStationsByRoute($route);
        
        if($stations){
            include('app/views/Admin/updatedScheduleByRoute.php');
       }else{
          echo "No Train Available For this Route";
       }
    }
}


}
