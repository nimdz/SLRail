<?php
class PassengerController {
    // Display the registration form
    public function registerPage() {
        // Include the registration form view
        require('views/register.php');
    }

    // Handle the registration form submission
    public function register() {
        // Include the Passenger model
        require_once('models/PassengerModel.php');

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get user input
            $username = $_POST['username'];
            $fullname = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            // Create a new PassengerModel instance
            $passengerModel = new PassengerModel();
            
            // Call the registration method
            $result = $passengerModel->registerPassenger($username, $full_name, $email, $password);

            if ($result) {
                // Registration successful, redirect to a success page
                echo "Registration Successful!";
                exit;
            } else {
                // Registration failed, show an error message
                $errorMessage = "Registration failed. Please try again.";
                require('views/register.php');
            }
        } else {
            // Display the registration form
            $this->registerPage();
        }
    }
}

?>