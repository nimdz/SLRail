<?php

require_once 'models/PassengerModel.php';

class PassengerController
{
    public function register()
    {
     // Load the registration form view (register.php)
        include('views/Passenger/register.php');
        // Retrieve data from the registration form
        $username = $_POST["username"];
        $password = $_POST["password"];
        $full_name = $_POST["full_name"];
        $email = $_POST["email"];

        // Create an instance of the PassengerModel
        $passengerModel = new PassengerModel();

        // Register the passenger
        $registrationResult = $passengerModel->registerPassenger($username, $password, $full_name, $email);

        if ($registrationResult) {
            // Registration successful
            echo '<script>alert("Registration Successful!")</script>';
        } else {
            // Registration failed
            echo "Error: Registration failed.";
        }
    }
    public function login()
    {
       // Start a session
         session_start();
      // Load the login form view
       include('views/Passenger/passenger_login.php');

      // Check if the form was submitted
      if ($_SERVER['REQUEST_METHOD'] === 'POST')
       {
            // Retrieve input data
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Create an instance of the PassengerModel
            $passengerModel = new PassengerModel();

            // Login passenger
            $loginResult = $passengerModel->loginPassenger($username, $password);

            if ($loginResult) {
                      // Store the user ID and username in session variables
               $_SESSION['user_id'] = $loginResult['id'];
               $_SESSION['username'] = $loginResult['username'];

                  // Redirect the user to the dashboard
                  echo '<script>alert("Login Successful!")</script>';
                  header("Location: /SlRail/passenger/dashboard");
            } else {
                echo '<script>alert("Login Failed!")</script>';
            }
       }
    }
    public function dashboard()
    {
        // Load the dashboard view
        include('views/Passenger/passenger_dashboard.php');
    }

    public function logout(){
       //Session Start
       session_start();

       $passengerModel=new PassengerModel();
       $passengerModel->logoutPassenger();

       header("Location:/SlRail/passenger/login");
    }

}
?>
