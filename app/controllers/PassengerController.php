<?php

require_once 'app/models/Passenger/PassengerModel.php';


class PassengerController 
{

    private function requireAuth() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            echo '<script>alert("You need to log in to access this page.");</script>';
            echo '<script>window.location.href = "/SlRail/home/login";</script>';
            exit();
        }
    }
    public function register()
    {
        session_start();
        // Load the registration form view (register.php)
        include('app/views/Passenger/passenger_register.php');
    
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve data from the registration form
            $username = $_POST['username'];
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // Create an instance of the PassengerModel
            $passengerModel = new PassengerModel();
    
            // Validate the form data
            $formErrors = $passengerModel->validateForm($username, $full_name, $email, $password);
    
            if ($formErrors === true) {
                // Register the passenger
                $registrationResult = $passengerModel->registerPassenger($username, $full_name, $email, $password);
    
                if ($registrationResult) {
                    // Registration successful
                    echo '<script>alert("Registration Successful!")</script>';
                } else {
                    // Registration failed
                    echo '<script>alert("Error: Registration failed.")</script>';
                }
            } else {
                // Display validation errors
                foreach ($formErrors as $error) {
                    echo '<script>alert("' . $error . '")</script>';
                }
            }
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
                echo '<script>alert("Password Reset Successful!"); window.location.href = "/SlRail/home/login";</script>';
                exit();
            }else{
                echo '<script>alert("Error: Unable to reset the password.")</script>';
            }
        }
        
      
    }
    public function dashboard()
    {


        $this->requireAuth();

        // Load the dashboard view
        include('app/views/Passenger/passenger_dashboard.php');
    }
    public function viewLocation()
    {
        $this->requireAuth();

        // Load the dashboard view
        include('app/views/Passenger/live_location_view.php');
    }

    public function profile()
    {

        $this->requireAuth();

    
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

        $this->requireAuth();

       

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
    public function deletePassenger()
    {
        // Check if passenger_id is provided in the URL parameters
        if (!isset($_GET['passenger_id'])) {
            // Redirect or handle the error as needed
            echo "Passenger ID is missing.";
            return;
        }

        // Get the passenger_id from the URL parameters
        $passenger_id = $_GET['passenger_id'];

        $passengerModel=new PassengerModel();
        // Call the deletePassenger method from the model
        $result = $passengerModel->deletePassenger($passenger_id);

        // Redirect to appropriate page based on the result
        if ($result) {
            // Deletion successful
            header("Location: /SlRail/admin/dashboard"); // Redirect to dashboard or any other appropriate page
            exit();
        } else {
            // Deletion failed
            echo "Failed to delete passenger.";
            // Optionally, you can redirect to an error page
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
