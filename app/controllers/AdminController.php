<?php

require_once 'app/models/Admin/AdminModel.php';
require_once 'app/models/Passenger/PassengerModel.php';
require_once 'app/models/Employee/TrainModel.php';
require_once 'app/models/Employee/StationModel.php';


class AdminController
{
  
    public function login()
    {
        // Start a session
        session_start();

        // Load the login form view
        include('app/views/Admin/admin_login.php');

        // Check if the form was submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve input data
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Create an instance of the StationmasterModel
            $adminModel = new AdminModel();

            // Attempt to log in the station master
            $loginResult = $adminModel->login($username, $password);

            if ($loginResult !== false) {
                // Store the username in a session variable
                $_SESSION['username'] = $loginResult;

                // Redirect the user to the dashboard
                header("Location: /SlRail/admin/dashboard");
                exit();
            } else {
                echo '<script>alert("Login Failed!")</script>';
            }
        }
    }
    public function dashboard()
{

    $adminModel = new AdminModel();

    $passenger_count = $adminModel->getPassengerCount();
    $train_count = $adminModel->getTrainCount();
    $employee_count = $adminModel->getEmployeeCount();
    $station_count = $adminModel->getStationCount();



    // Load the dashboard view
    include('app/views/Admin/admin_dashboard.php');
}
    public function allPassengers(){
        session_start();
 
        $passengerModel=new PassengerModel();
        $passengers=$passengerModel->getAllPassengers();
        
        if($passengers){
          include('app/views/Admin/allpassengers.php');
       }else{
          echo "Currently No Passengers in the System";
        }
     }
  
    public function logout(){
       //Session Start
       session_start();

       $adminModel = new AdminModel();
       $adminModel->logout();

       header("Location:/SlRail/home/login");
    }

    public function assign_td(){
    
        session_start();
        $adminModel=new TrainModel();
        $data=$adminModel->loadForm();

        include('app/views/Admin/ad_assigndriver.php');
    }

    public function addDriver(){
    
          $train_number=$_POST['train_number'];
          $schedule_id=$_POST['schedule_id'];
          $employee_id=$_POST['employee_id'];

          $addModel=new TrainModel();
          $result=$addModel->AssignDriver($train_number,$schedule_id,$employee_id);

          if ($result === true) {
            // Success message
            echo '<script>alert("Train Driver Assigned Successfully!"); window.location.href = "/SlRail/admin/dashboard";</script>';
        } else {
            // Failure message
            echo "Failed to Assign Driver.";
        }
    }
    public function assign_sm(){
        session_start();
        $adminModel = new StationModel();
        
        // Fetch station names and employee data from the model
        $data = $adminModel->getDataForAssignSM();
        
        // Load the view
        include('app/views/Admin/ad_assignsm.php');
    }

    public function addSm(){
    
        $station_name=$_POST['station_name'];
        $employee_id=$_POST['employee_id'];

        $addModel=new StationModel();
        $result=$addModel->AssignSm($station_name,$employee_id);

        if ($result === true) {
          // Success message
          echo '<script>alert("Station Master Assigned Successfully!"); window.location.href = "/SlRail/admin/dashboard";</script>';
      } else {
          // Failure message
          echo "Failed to Assign Station Master.";
      }
  }
    
    

}
?>