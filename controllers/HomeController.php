<?php

require_once 'models/Home/HomeModel.php';
require_once 'models/Employee/EmployeeModel.php';
require_once 'models/Passenger/PassengerModel.php';
require_once 'models/Admin/AdminModel.php';

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
        // Start a session
        session_start();

        // Load the login form view
        include 'views/login.php';

        // Check if the form was submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve input data
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Create an instance of the EmployeeModel
            $employeeModel = new EmployeeModel();

            // Attempt to log in as an employee
            $employeeResult = $employeeModel->loginEmployee($username, $password);

            if ($employeeResult) {
                // Redirect based on the employee's role
                $this->redirectBasedOnRole($employeeResult['position']);
            } else {
                // If login as an employee fails, try as a passenger
                $passengerModel = new PassengerModel();
                $passengerResult = $passengerModel->loginPassenger($username, $password);

                if ($passengerResult) {
                    // Store passenger details in session
                    $_SESSION['user_id'] = $passengerResult['id'];
                    $_SESSION['username'] = $passengerResult['username'];
                    $_SESSION['full_name'] = $passengerResult['full_name'];
                    $_SESSION['email'] = $passengerResult['email'];

                    // Redirect to passenger dashboard
                    header("Location: /SlRail/passenger/dashboard");
                    exit();
                } else {
                    // If login as a passenger fails, try as an admin
                    $adminModel = new AdminModel();
                    $adminResult = $adminModel->login($username, $password);

                    if ($adminResult !== false) {
                        // Store the username in a session variable
                        $_SESSION['username'] = $adminResult;

                        // Redirect the user to the admin dashboard
                        header("Location: /SlRail/admin/dashboard");
                        exit();
                    } else {
                        echo '<script>alert("Login Failed!")</script>';
                    }
                }
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
