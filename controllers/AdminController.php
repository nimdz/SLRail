<?php

require_once 'models/Admin/AdminModel.php';

class AdminController
{
  
    public function login()
    {
        // Start a session
        session_start();

        // Load the login form view
        include('views/Admin/admin_login.php');

        // Check if the form was submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve input data
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Create an instance of the StationmasterModel
            $adminModel = new AdminModel();

            // Attempt to log in the station master
            $loginResult = $adminModel->loginAdmin($username, $password);

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
        // Load the dashboard view
        include('views/Admin/admin_dashboard.php');
    }

    public function logout(){
       //Session Start
       session_start();

       $adminModel = new AdminModel();
       $adminModel->logoutAdmin();

       header("Location:/SlRail/admin/login");
    }

}
?>