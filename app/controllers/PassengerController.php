<?php

require_once 'app/models/Passenger/PassengerModel.php';


class PassengerController 
{
    public function register()
    {
     // Load the registration form view (register.php)
        include('app/views/Passenger/passenger_register.php');
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
   
    public function forgotPassword(){

        session_start();
        
        include('app/views/Passenger/password_forget.php');

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $username=$_POST['username'];
            $newPassword=$_POST['newPassword'];

            $passengerModel=new PassengerModel();
            $result=$passengerModel->resetPassword($username,$newPassword);

            if($result){
                echo '<script>alert("Password reset successfully! Login with your new password.")</script>';
                header("Location: /SlRail/home/login");
                exit();
            }else{
                echo '<script>alert("Error: Unable to reset the password.")</script>';
            }
        }
        
      
    }
    public function dashboard()
    {
        session_start();
        // Load the dashboard view
        include('app/views/Passenger/passenger_dashboard.php');
    }
    public function viewLocation()
    {
        // Load the dashboard view
        include('app/views/Passenger/live_location_view.php');
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
                include('app/views/Passenger/profile.php');
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
 
        header("Location:/SlRail/home/login");
     }

}
?>
