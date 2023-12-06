<?php

require_once 'models/Home/HomeModel.php';
require_once 'models/Employee/EmployeeModel.php';

class HomeController
{
    public function index()
    {
        try {
            // Create an instance of the model
            $model = new HomeModel();

            // Get data for the home page
            $data = $model->getHomePageData();

            // Load the view and pass data to it
            include 'views/home.php';
        } catch (Exception $e) {
            // Handle exceptions gracefully, e.g., log the error
            echo '<script>alert("Error: Unable to load the home page.")</script>';
        }
    }

    public function login()
    {
        session_start();

        include 'views/login.php';

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            try {
                $employeeModel = new EmployeeModel();
                $user = $employeeModel->loginEmployee($username, $password);

                if ($user) {
                    $this->redirectBasedOnRole($user['position']);
                } else {
                    echo '<script>alert("Login Failed")</script>';
                }
            } catch (Exception $e) {
                // Handle exceptions gracefully, e.g., log the error
                echo '<script>alert("Error: Unable to process the login request.")</script>';
            }
        }
    }

    protected function redirectBasedOnRole($position)
    {
        try {
            switch ($position) {
                case "1":
                    header('Location: /SlRail/stationmaster/dashboard');
                    break;
                case "2":
                    header('Location: /SlRail/traindriver/dashboard');
                    break;
                case "3":
                    header('Location: /SlRail/ticketingofficer/dashboard');
                    break;
                default:
                    header('Location: /SlRail/home/login');
                    break;
            }
        } catch (Exception $e) {
            // Handle exceptions gracefully, e.g., log the error
            echo '<script>alert("Error: Unable to redirect based on role.")</script>';
        }
    }
}
?>

