<?php

require_once 'models/Employee/EmployeeModel.php';
require_once 'models/Employee/AnnouncementModel.php';

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
                    // User does not have the required permission
                    echo '<script>alert("Error: You do not have the required permission.")</script>';
                }
            } else {
                // Login failed
                echo '<script>alert("Error: Login failed. Please check your credentials.")</script>';
            }
        }
    }

    public function logout()
    {
        session_start();

        $smModel = new EmployeeModel();
        $smModel->logoutEmployee();

        header("Location:/SlRail/stationmaster/login");
    }

    public function dashboard()
    {
        include 'views/StationMaster/sm_dashboard.php';
    }

    public function createAnnouncement()
    {
    // Start a session
    session_start();

    $announcementModel = new AnnouncementModel();

    $data = [
        'title' => '',
        'description' => '',
        'title_err' => '',
        'description_err' => '',
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data['title'] = $_POST['title'] ?? '';
        $data['description'] = $_POST['description'] ?? '';

        // Validate form data
        if (empty($data['title'])) {
            $data['title_err'] = 'Please enter a title.';
        }

        if (empty($data['description'])) {
            $data['description_err'] = 'Please enter a description.';
        }

        // If there are no errors, proceed to add announcement
        if (empty($data['title_err']) && empty($data['description_err'])) {
            $result = $announcementModel->addAnnouncement($data['title'], $data['description']);

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
    }

    // Load the view for adding announcements with error messages
    include('views/StationMaster/sm_add_announcements.php');
   }

   public function manageAnnouncements()
    {
        // Start a session
        session_start();

        $announcementModel = new AnnouncementModel();
        $announcements = $announcementModel->getAnnouncement();

        // Load the view for managing announcements
        include('views/StationMaster/sm_manage_announcements.php');
    }

}
