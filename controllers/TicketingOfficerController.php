<?php

require_once 'models/Employee/EmployeeModel.php';

class StationmasterController
{
    public function login()
    {
         // Start a session
         session_start();

        include 'views/Admin/employee_login.php';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $smModel = new EmployeeModel();
            $user = $smModel->loginEmployee($username, $password);

            if ($user) {
                // Check if the user's position is equal to 1 (assuming 1 represents the desired position/role)
                if ($user['position'] === "3") {
                    // Redirect the user to their respective dashboard
                    header("Location: /SlRail/views/TicketingOfficer/to_dashboard.php");
                } else {
                    // User does not have the required position
                    echo '<script>alert("Error: You do not have the required permission.")</script>';
                }
            } else {
                // Login failed
                echo '<script>alert("Error: Login failed. Please check your credentials.")</script>';
            }
        }
    
    }

    public function logout(){
      session_start();

      $smModel=new EmployeeModel();
      $smModel->logoutEmployee();

      header("Location:/SlRail/ticketingofficer/login");

    }

    public function dashboard(){
         include ('views/TicketingOfficer/to_dashboard.php');
    }
}