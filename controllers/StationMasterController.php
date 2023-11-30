<?php

require_once 'models/Employee/EmployeeModel.php';
require_once 'models/AnnouncementModel.php';  // Include the AnnouncementModel

class StationmasterController
{
    public function login()
    {
         // Start a session
         session_start();

        include 'views/StationMaster/sm_login.php';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $smModel = new EmployeeModel();
            $user = $smModel->loginEmployee($username, $password);

            if ($user) {
                // Check if the user's position is equal to 1 (assuming 1 represents the desired position/role)
                if ($user['position'] === "1") {
                    // Redirect the user to their respective dashboard
                    header("Location: /SlRail/stationmaster/dashboard");             
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

      header("Location:/SlRail/stationmaster/login");

    }

    public function dashboard(){
         include ('views/StationMaster/sm_dashboard.php');
    }

    public function createAnnouncement()
    {
        // Start a session
        session_start();

        $announcementModel = new AnnouncementModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];

            // Validate form data (you can add more validation as needed)

            // Add announcement to the database
            $result = $announcementModel->addAnnouncement($title, $description);

            if ($result) {
                // Announcement added successfully
                echo '<script>alert("Announcement added successfully.")</script>';
                // Redirect to the announcements page or any other page as needed
                header("Location: /SlRail/stationmaster/announcements");
            } else {
                // Error adding announcement
                echo '<script>alert("Error adding announcement. Please try again.")</script>';
            }
        }

        // Load the view for adding announcements
        include ('views/StationMaster/sm_add_announcements.php');
    }
}