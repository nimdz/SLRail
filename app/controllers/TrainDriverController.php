<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require_once 'app/models/Employee/EmployeeModel.php';

class TraindriverController
{
    public function profile()
    {
        // Start a session
        session_start();
    
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
    
            $tdModel = new EmployeeModel();
    
            $profile = $tdModel->getEmployeeDetails($id);
    
            if ($profile) {
                include('app/views/TrainDriver/profile.php');
            } else {
                echo '<script>alert("Error: Train Driver Not Found!")</script>';
            }
        } else {
            echo '<script>alert("Error: User Not Logged In!"); window.location.href="/SlRail/home/login";</script>';
        }
    }
  
    public function updateProfile()
    {
        // Start a session
        session_start();

        // Check if the user is logged in
        if (isset($_SESSION['user_id'])) {
            $employee_id = $_SESSION['user_id'];

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
                header("Location: /SlRail/traindriver/profile");
                exit();
            } else {
                // Handle the case where the update fails
                echo '<script>alert("Error When Updating details! "); window.location.href="/SlRail/traindriver/profile";</script>';
            }
        } else {
            // Handle the case where the user is not logged in
            echo '<script>alert("Error: User Not Logged In!"); window.location.href="/SlRail/home/login";</script>';
        }
    }

  public function dashboard(){
      session_start();
      include ('app/views/TrainDriver/td_dashboard.php');
  }
 public function logout(){
       session_start();

       $tdModel=new EmployeeModel();
       $tdModel->logoutEmployee();

       header("Location:/SlRail/home/login");
    }

  
}