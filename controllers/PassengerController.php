<?php

require_once 'models/Passenger/PassengerModel.php';

class PassengerController
{
    public function register()
    {
     // Load the registration form view (register.php)
        include('views/Passenger/passenger_register.php');
        // Retrieve data from the registration form
        $username = $_POST["username"];
        $password = $_POST["password"];
        $full_name = $_POST["full_name"];
        $email = $_POST["email"];
        $nic= $_POST["nic"];

        // Create an instance of the PassengerModel
        $passengerModel = new PassengerModel();

        // Register the passenger
        $registrationResult = $passengerModel->registerPassenger($username, $password, $full_name, $email,$nic);

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
                      // Store the user ID , username,full_name and email in session variables
               $_SESSION['user_id'] = $loginResult['id'];
               $_SESSION['username'] = $loginResult['username'];
               $_SESSION['full_name'] = $loginResult['full_name'];
               $_SESSION['email'] = $loginResult['email'];

                  // Redirect the user to the dashboard
                  echo '<script>alert("Login Successful!")</script>';
                  header("Location: /SlRail/passenger/dashboard");
                  exit();
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

    public function profile()
    {
        // Start a session
        session_start();
    
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
    
            $passengerModel = new PassengerModel();
    
            $profile = $passengerModel->getPassengerDetails($id);
    
            if ($profile) {
                include('views/Passenger/profile.php');
            } else {
                echo '<script>alert("Error: Passenger Not Found!")</script>';
            }
        } else {
            echo '<script>alert("Error: User Not Logged In!")</script>';
        }
    }

    public function updateProfile(){
         // Start Session
         session_start();

         if(isset($_SESSION['user_id'])){

            $user_id = $_SESSION['user_id'];
            $full_name=$_POST["full_name"];
            $email=$_POST["email"];

            $passengerModel=new PassengerModel();
            $result=$passengerModel->updatePassenger($user_id,$full_name,$email);

            if($result){
                echo '<script>alert("Your Details Updated Successful!"); window.location.href = "/SlRail/passenger/dashboard";</script>';
               exit();        
            }else{
                echo '<script>alert("Error When Updating details! ")</script>';        
            }
          
        }
    
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
