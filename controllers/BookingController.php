<?php

require_once 'models/BookingModel.php';

class BookingController
{
    public function booking()
    {
        // Start a session to access session variables
        session_start();

        // Check if the user is logged in and get the user's ID
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            // Retrieve data from the booking form
            $departure_station = $_POST["departure_station"];
            $destination_station = $_POST["destination_station"];
            $departure_date = $_POST["departure_date"];
            $number_of_passengers = $_POST["number_of_passengers"];

            // Create an instance of the BookingModel
            $bookingModel = new BookingModel();

            // Pass the user_id and other data to the BookingModel
            $bookingResult = $bookingModel->addbooking($user_id, $departure_station, $destination_station, $departure_date, $number_of_passengers);

            if ($bookingResult) {
                // Booking successful
                echo '<script>alert("Booking Successful!"); window.location.href = "/SlRail/passenger/dashboard";</script>';
                exit();

            } else {
                // Booking failed
                echo "Error: Booking failed.";
            }
        } else {
            // Handle the case where the user is not logged in
            echo "Please log in to make a booking.";
        }
    }

    public function userBookings(){
       //start session
       session_start();

       //check if the user logged in
       if(isset($_SESSION['user_id'])){
           $user_id=$_SESSION['user_id'];

           //Create an instance of BookingModel
            $bookingModel=new BookingModel();

            //Fetch the booking from database
            $bookings=$bookingModel->getBooking($user_id);

            //Load bookings
            include('views/allbookings.php');
       }else{
     
       echo "You don't have any bookings currently";
      }      
    }
    public function update()
    {
        // Start a session to access session variables
        session_start();

        // Check if the user is logged in and get the user's ID
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            // Retrieve data from the booking form
            $booking_id = $_POST['booking_id'];
            $departure_station = $_POST["departure_station"];
            $destination_station = $_POST["destination_station"];
            $departure_date = $_POST["departure_date"];
            $number_of_passengers = $_POST["number_of_passengers"];

            // Create an instance of the BookingModel
            $bookingModel = new BookingModel();

            // Pass the user_id and other data to the BookingModel
            $bookingResult = $bookingModel->updatebooking( $booking_id,$departure_station, $destination_station, $departure_date, $number_of_passengers);

            if ($bookingResult) {
                // Booking successful
                echo '<script>alert("Booking Updated Successful!"); window.location.href = "/SlRail/passenger/dashboard";</script>';
                exit();

            } else {
                // Booking failed
                echo "Error: Booking Updation failed.";
            }
        } else {
            // Handle the case where the user is not logged in
            echo "Please log in to Update a booking.";
        }
    }
    public function deleteBooking() {
        if (isset($_GET['booking_id'])) {
            $booking_id = $_GET['booking_id'];
    
            // Validate and process $booking_id as needed
    
            $bookingModel = new BookingModel();
    
            if ($bookingModel->deleteBooking($booking_id)) {
                // Deletion successful
                echo '<script>alert("Booking Deleted Successful!"); window.location.href = "/SlRail/passenger/dashboard";</script>';
                exit();
            } else {
                // Deletion failed
                echo 'Error: Deletion failed.';
            }
        }
    }
    
}
?>
