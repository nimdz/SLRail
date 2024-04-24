<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require_once 'app/models/Passenger/BookingModel.php';
require_once 'app/models/Employee/TrainScheduleModel.php';
require_once 'app/models/Employee/TrainLocationModel.php';
require_once 'vendor/autoload.php'; 
use Endroid\QrCode\QrCode;//qr code
use Dompdf\Dompdf;//pdf



class BookingController
{
 
    private function requireAuth() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            echo '<script>alert("You need to log in to access this page.");</script>';
            echo '<script>window.location.href = "/SlRail/home/login";</script>';
            exit();
        }
    }
        public function search()
    {

        $this->requireAuth();

        // Retrieve data from the query parameters
        $departure_station = isset($_GET["departure_station"]) ? $_GET["departure_station"] : '';
        $destination_station = isset($_GET["destination_station"]) ? $_GET["destination_station"] : '';
        $departure_date = isset($_GET["departure_date"]) ? $_GET["departure_date"] : '';
        $train_number = isset($_GET["train_number"]) ? $_GET["train_number"] : '';
        $train_type = isset($_GET["train_type"]) ? $_GET["train_type"] : '';        
        $number_of_passengers = isset($_GET["number_of_passengers"]) ? $_GET["number_of_passengers"] : '';
        $seat_class = isset($_GET["seat_class"]) ? $_GET["seat_class"] : '';
        $arrivalTime= isset($_GET["arrivalTime"]) ? $_GET["arrivalTime"] : '';
        $departureTime= isset($_GET["departureTime"]) ? $_GET["departureTime"] : '';

        // Store data in session variables
        $_SESSION['search_data'] = [
            'departure_station' => $departure_station,
            'destination_station' => $destination_station,
            'departure_date' => $departure_date,
            'number_of_passengers' => $number_of_passengers,
            'seat_class' => $seat_class,
            'train_number'=>$train_number,
            'train_type' =>$train_type,
            'arrivalTime' =>$arrivalTime,
            'departureTime' =>$departureTime,
        ];

       
        
        // Fetch the ticket price for each available train
        $priceModel = new BookingModel;
        $price = $priceModel->fetchPrice($departure_station, $destination_station, $seat_class, $number_of_passengers);
 
        // Debugging: Output the fetched ticket price
        //echo "Fetched ticket price: $price<br>";

        // Store ticket price in session data
        $_SESSION['search_data']['prices'] = $price;


        // Include the view file after retrieving the necessary data
        include('app/views/Passenger/availabletrains.php');



    }


    public function add()
    {
        // Start a session to access session variables
        $this->requireAuth();
        
        include('app/views/Passenger/availabletrains.php');


        // Debugging: Print out the $_POST array
         echo '<script>console.log(' . json_encode($_POST) . ');</script>';

        // Check if the user is logged in and get the user's ID
        if (isset($_SESSION['user_id'])) {

            $user_id = $_SESSION['user_id'];
            echo '<script>console.log("User ID: ' . $user_id . '");</script>';

            // Retrieve data from the booking form
            $train_number=$_POST["train_number"];
            $train_type=$_POST["train_type"];
            $departure_station = $_POST["departure_station"];
            $destination_station = $_POST["destination_station"];
            $departure_date = $_POST["departure_date"];
            $number_of_passengers = $_POST["number_of_passengers"];
            $seat_class = $_POST["seat_class"];
            $ticket_price=$_POST["ticket_price"];
            $departureTime=$_POST["departureTime"];
            $arrivalTime=$_POST["arrivalTime"];

            // Create an instance of the BookingModel
            $bookingModel = new BookingModel();

            // Pass the user_id and other data to the BookingModel
            $bookingResult = $bookingModel->addbooking($user_id,$train_number,$train_type, $departure_station, $destination_station, $departure_date, $number_of_passengers,$seat_class,$ticket_price,$departureTime,$arrivalTime);

            if ($bookingResult) {
                                // Booking successful
                echo '<script>alert("Booking Added Successful!"); window.location.href = "/SlRail/passenger/dashboard";</script>';
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

        $this->requireAuth();

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
            include('app/views/Passenger/allbookings.php');
       }else{
     
       echo "You don't have any bookings currently";
      }      
    }
 
    public function deleteBooking() {

        $this->requireAuth();

        if (isset($_GET['booking_id'])) {
            $booking_id = $_GET['booking_id'];
    
            // Validate and process $booking_id as needed
    
            $bookingModel = new BookingModel();
            $bookingResult = $bookingModel->deletebooking($booking_id);
    
            if ($bookingResult) {
                // Deletion successful
                echo '<script>alert("Booking Deleted Successful!"); window.location.href = "/SlRail/passenger/dashboard";</script>';
                exit();
            } else {
                // Deletion failed
                echo 'Error: Deletion failed.';
            }
        }
    }
    public function downloadTicketPdf()
    {

        $this->requireAuth();

        // Check if booking_id is provided in the query parameters
        if (isset($_GET['booking_id'])) {
            $booking_id = $_GET['booking_id'];
    
            $qr_booking_id = 'QR' . str_pad($booking_id, 7, '0', STR_PAD_LEFT);

            // Create an instance of BookingModel
            $bookingModel = new BookingModel();
    
            // Fetch ticket details based on the booking ID
            $bookingDetails = $bookingModel->getticketdetails($booking_id);
    
            if ($bookingDetails) {
                 // Create a QR code with booking_id
                $qrCode = new QrCode($qr_booking_id);

                // Get the QR code image data
                $qrCodeData = $qrCode->writeString();
                // Render the view file and get the HTML content with booking details
                ob_start();
                include('app/views/Passenger/ticket_details.php');
                $htmlContent = ob_get_clean();
    
                // Send the HTML content to the client
                echo $htmlContent;
                exit;
            } else {
                echo "Booking not found.";
            }
        } else {
            echo "Booking ID not provided.";
        }
    }

    public function to_bookingview(){

        $this->requireAuth();


        if (isset($_GET['booking_id'])) {
            $booking_id = $_GET['booking_id'];

              // Create an instance of BookingModel
            $bookingModel = new BookingModel();
    
              // Fetch ticket details based on the booking ID
            $bookingDetails = $bookingModel->getticketdetails($booking_id);

            include('app/views/TicketingOfficer/bookingview.php');
        }else{
            echo "No Booking Available";
        }
    
    }

    public function selectroute(){
        session_start();

        include('app/views/Passenger/all_routes.php');
    }

    public function loadForm(){

        $this->requireAuth();

        
        $loadModel=new TrainLocationModel();
        $trains=$loadModel->getAllTrainInfo();

        include('app/views/TicketingOfficer/loadform.php');
    
    }
    public function viewAllBookings() {

        $this->requireAuth();

        // Check if $_POST['train_no'] is set and display its value
        if(isset($_POST['train_no'])) {
            $train_number = $_POST['train_no'];
           
        } else {
            echo "No train number received <br>";
        }
    
    
        // Create an instance of BookingModel
        $bookingModel = new BookingModel();
    
        // Get bookings by train number
        $bookings = $bookingModel->getBookingsByTrainNumber($train_number);
    
        // Include the view file
        include('app/views/TicketingOfficer/to_allBookings.php');
    }
    
   public function getBookingDataForChart()
   {
      $this->requireAuth();

       // Initialize BookingModel
       $bookingModel = new BookingModel();

       // Get booking counts for today
       $bookingCounts = $bookingModel->getBookingCountsForToday();

       // Output booking counts as JSON
       echo json_encode($bookingCounts);
       
   }
    
    
    

}


?>
