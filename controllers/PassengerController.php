<?php

require_once 'models/PassengerModel.php';

class PassengerController
{
    public function register()
    {
     // Load the registration form view (register.php)
        include('views/Register.php');
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
            echo "Registration successful!";
        } else {
            // Registration failed
            echo "Error: Registration failed.";
        }
    }
}
?>
