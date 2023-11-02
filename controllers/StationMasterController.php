<?php

require_once 'models/StationmasterModel.php';

class StationMasterController
{
  
    public function login()
    {
        // Start a session
        session_start();

        // Load the login form view
        include('views/StationMaster/station_master_login.php');

        // Check if the form was submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve input data
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Create an instance of the StationmasterModel
            $stationmasterModel = new StationmasterModel();

            // Attempt to log in the station master
            $loginResult = $stationmasterModel->loginSm($username, $password);

            if ($loginResult !== false) {
                // Store the username in a session variable
                $_SESSION['username'] = $loginResult;

                // Redirect the user to the dashboard
                header("Location: /SlRail/employee/dashboard");
                exit();
            } else {
                echo '<script>alert("Login Failed!")</script>';
            }
        }
    }
    public function dashboard()
    {
        // Load the dashboard view
        include('views/sm_dashboard.php');
    }

    public function logout(){
       //Session Start
       session_start();

       $passengerModel=new StationmasterModel();
       $passengerModel->logoutSm();

       header("Location:/SlRail/employee/login");
    }

}
?>