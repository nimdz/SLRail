<?php

require_once 'app/models/Employee/EmployeeModel.php';

class StationmasterController
{


    public function logout(){
      session_start();

      $smModel=new EmployeeModel();
      $smModel->logoutEmployee();

      header("Location:/SlRail/home/login");

    }
    public function profile()
    {
        // Start a session
        session_start();
    
        if (isset($_SESSION['employee_id'])) {
            $id = $_SESSION['employee_id'];
    
            $tdModel = new EmployeeModel();
    
            $profile = $tdModel->getEmployeeDetails($id);
    
            if ($profile) {
                include('app/views/stationmaster/profile.php');
            } else {
                echo '<script>alert("Error: Station Master Not Found!")</script>';
            }
        } else {
            echo '<script>alert("Error: User Not Logged In!")</script>';
        }
    }
  
public function updateProfile()
{
    // Start a session
    session_start();

    // Check if the user is logged in
    if (isset($_SESSION['employee_id'])) {
        $employee_id = $_SESSION['employee_id'];

        // Get the updated details from the POST request
        $full_name = $_POST["full_name"];
        $email = $_POST["email"];
        $nic = $_POST["nic"];
        $username = $_POST["username"];

        // Instantiate the EmployeeModel
        $tdModel = new EmployeeModel();

        // Update the employee details
        $result = $tdModel->updateEmployee($employee_id, $full_name, $email, $nic, $username);

        if ($result) {
            // Redirect to the profile page after a successful update
            header("Location: /SlRail/stationmaster/profile");
            exit();
        } else {
            // Handle the case where the update fails
            echo '<script>alert("Error When Updating details! "); window.location.href="/SlRail/stationmaster/profile";</script>';
        }
    } else {
        // Handle the case where the user is not logged in
        echo '<script>alert("Error: User Not Logged In!"); window.location.href="/SlRail/stationmaster/login";</script>';
    }
}

    public function dashboard(){
         include ('app/views/StationMaster/sm_dashboard.php');
    }

    public function trainsAdd(){
        include ('app/views/StationMaster/sm_add_trains.php');
   }

}