<?php

require_once 'app/includes/database.php';

class BookingModel
{
    private $db;

    public function __construct()
    {
        // Create a new instance of the Database class
        $this->db = new Database();
    }
    // public function fetchPrice($departure_station, $destination_station, $seat_class)
    // {
    //     $conn = $this->db->getConnection();
    
    //     // Construct the trip string
    //     $trip = $departure_station . " -> " . $destination_station;
    
    //     // Debug: Output the trip string to console or log
    //     //echo "Debug: Trip string: $trip<br>";
    
    //     // Choose the appropriate price column based on the seat class
    //     switch ($seat_class) {
    //         case 'Class1':
    //             $price_column = 'Class1_price';
    //             break;
    //         case 'Class2':
    //             $price_column = 'Class2_price';
    //             break;
    //         case 'Class3':
    //             $price_column = 'Class3_price';
    //             break;
    //         default:
    //             return false; // Invalid seat class
    //     }
    
    //     // Prepare the SQL query
    //     $sql = "SELECT $price_column FROM TicketPrices WHERE trip = ?";
    //     $stmt = $conn->prepare($sql);
    
    //     if ($stmt === false) {
    //         die("Error: " . $conn->error);
    //     }
    
    //     // Bind the trip parameter
    //     $stmt->bind_param("s", $trip);
    
    //     // Execute the query
    //     if (!$stmt->execute()) {
    //         // Handle execute error
    //         return false;
    //     }
    
    //     // Get the result
    //     $result = $stmt->get_result();
    
    //     // Check if any rows were returned
    //     if ($result->num_rows === 0) {
    //         // No price found for the specified trip and class
    //         return false;
    //     }
    
    //     // Fetch the row
    //     $row = $result->fetch_assoc();
    
    //     // Get the price from the fetched row
    //     $price = $row[$price_column];
    
    //     // Debug: Output the fetched price
    //     //echo "Debug: Price fetched: $price<br>";
    
    //     // Close the statement and return the price
    //     $stmt->close();
    //     return $price;
    // }
    


    public function fetchPrice($departure_station, $destination_station, $seat_class,$number_of_passengers,$train_number)
    {
        $conn = $this->db->getConnection();
    
        // Construct the trip string
        $trip = $departure_station . " -> " . $destination_station;
    
         //Debug: Output the trip string to console or log
         //echo "Debug: Trip string: $trip<br>";
    
        // Fetch the number of stoppings from train schedules
        $stoppings = $this->getNumberOfStations($departure_station, $destination_station,$train_number);
         // Debug: Output the number of stoppings
         //echo "Debug: Number of stoppings: $stoppings<br>";
    
        // Calculate fare based on the number of stoppings
        $fare_per_passenger = $this->calculateFare($stoppings, $seat_class);

        // Calculate total fare for all passengers
        $total_fare = $fare_per_passenger * $number_of_passengers;

        // Return the total fare
        return $total_fare;
    }
    
    // Method to fetch the number of stoppings from train schedules
    private function getNumberOfStations($departure_station, $destination_station,$train_number)
    {
        $conn = $this->db->getConnection();
    
        // Prepare the SQL query
        $sql = "SELECT stoppings FROM train_schedules WHERE train_number=?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            die("Error: " . $conn->error);
        }
        //bind parameters
        $stmt->bind_param("i",$train_number);
    
        // Execute the query
        if (!$stmt->execute()) {
            // Handle execute error
            return false;
        }
    
        // Get the result
        $result = $stmt->get_result();
    
        // Fetch the row
        $row = $result->fetch_assoc();
    
        // Close the statement
        $stmt->close();
    
        // Get the stoppings string
        $stoppings = $row['stoppings'];
    
        // Split the stoppings string into an array of stations
        $stations = explode(',', $stoppings);
    
        // Find the indices of the departure and destination stations
        $departure_index = array_search($departure_station, $stations);
        $destination_index = array_search($destination_station, $stations);
    
        if ($departure_index === false || $destination_index === false) {
            // Departure or destination station not found in the list
            return false;
        }
    
        // Calculate the number of stations between the departure and destination stations
        $number_of_stations = abs($destination_index - $departure_index) + 1;
    
        return $number_of_stations;
    }
    
    
// Method to calculate fare based on the number of stoppings
public function calculateFare($stoppings, $seat_class)
{
    // Calculate additional fare based on the number of stoppings
    $additionalFare = 0;

    // Determine the fare rate based on the seat class
    switch ($seat_class) {
        case 'Class1':
            $fareRate = 100; // 100 rupees per 4 stations
            break;
        case 'Class2':
            $fareRate = 50; // 50 rupees per 4 stations
            break;
        case 'Class3':
            $fareRate = 20; // 20 rupees per 4 stations
            break;
        default:
            // Handle invalid seat class
            return false;
    }

    // Calculate additional fare based on the number of stoppings
    if ($stoppings > 0) {
        $additionalFare = ceil($stoppings / 4) * $fareRate;
    }

    return $additionalFare;
}

    

    
     

    public function addbooking($user_id, $train_number, $train_type, $departure_station, $destination_station, $departure_date, $number_of_passengers, $seat_class,$ticket_price,$departure_time,$arrival_time)
    {
        $conn = $this->db->getConnection();
    
        if (!$conn) {
            // Handle database connection error
            return false;
        }
    
        // Check if there are enough available seats in the specified class
        $seatClass = str_replace(' ', '', $seat_class);
        $checkSeatsSql = "SELECT available_seats_$seatClass FROM train WHERE train_number = ?";
        $checkSeatsStmt = $conn->prepare($checkSeatsSql);
    
        if (!$checkSeatsStmt) {
            // Handle prepare error
            die("Error preparing seat check statement: " . $conn->error);
        }
    
        $checkSeatsStmt->bind_param('i', $train_number);
    
        if (!$checkSeatsStmt->execute()) {
            // Handle execute error
            return false;
        }
    
        $checkSeatsStmt->bind_result($available_seats);
        $checkSeatsStmt->fetch();
        $checkSeatsStmt->close();
    
        if ($available_seats < $number_of_passengers) {
            // Not enough available seats
            return false;
        }
            // Fetch the ticket price
            $ticket_price = $this->fetchPrice($departure_station, $destination_station, $seat_class,$number_of_passengers,$train_number);

            // Output the fetched ticket price
           // echo "Fetched ticket price: $ticket_price<br>";

            // Handle if price fetching fails
            if ($ticket_price === false) {
                return false;
            }
       
        // Insert data into the 'bookings' table, including the 'user_id'
        $insertBookingSql = "INSERT INTO bookings (user_id, train_number, train_type, departure_station, destination_station, departure_date,number_of_passengers, seat_class,ticket_price,departure_time,arrival_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?,?)";
        $insertBookingStmt = $conn->prepare($insertBookingSql);
    
        if ($insertBookingStmt === false) {
            // Handle prepare error
            die("Error preparing booking insertion statement: " . $conn->error);
        }
    
        $insertBookingStmt->bind_param("iissssisiss", $user_id, $train_number, $train_type, $departure_station, $destination_station, $departure_date, $number_of_passengers, $seat_class,$ticket_price,$departure_time,$arrival_time);
    
        if (!$insertBookingStmt->execute()) {
            // Booking failed, handle accordingly
            return false;
        }
    
        // Update available seats in the 'train' table for the specified class
        $updateSeatsSql = "UPDATE train SET available_seats_$seatClass = available_seats_$seatClass - ? WHERE train_number = ?";
        $updateSeatsStmt = $conn->prepare($updateSeatsSql);
    
        if ($updateSeatsStmt === false) {
            // Handle prepare error
            die("Error preparing seat update statement: " . $conn->error);
        }
    
        $updateSeatsStmt->bind_param("ii", $number_of_passengers, $train_number);
    
        if (!$updateSeatsStmt->execute()) {
            // Handle seat update failure
            return false;
        }
    
        // Booking and seat update successful
        return true;
    }
    
   
    public function getBooking($user_id){
         $conn=$this->db->getConnection();

         //retrive bookings
         $sql="SELECT * FROM bookings WHERE user_id=?";
         $stmt=$conn->prepare($sql);
         if ($stmt === false) {
            die("Error: ". $conn->error);
         }

         $stmt->bind_param('i',$user_id);
         $stmt->execute();
         $result = $stmt->get_result();

         $bookings=array();
         while($row =$result ->fetch_assoc()){
          $bookings[]=$row;
        }

        return $bookings;

    }
    public function updateBooking($booking_id,$train_number,$train_type,$departure_station, $destination_station, $departure_date, $number_of_passengers)
{
    $conn = $this->db->getConnection();

    // Update the booking in the 'bookings' table
    $sql = "UPDATE bookings SET departure_station=?, destination_station=?, departure_date=?, number_of_passengers=?,train_number=?,train_type=?WHERE booking_id=?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("sssiiis", $departure_station, $destination_station, $departure_date, $number_of_passengers, $booking_id,$train_number,$train_type);

    if ($stmt->execute()) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}
public function deleteBooking($booking_id) {
    $conn = $this->db->getConnection();

    // Delete the booking from the 'bookings' table
    $sql = "DELETE FROM bookings WHERE booking_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("i", $booking_id);

    if ($stmt->execute()) {
        return true; // Deletion successful
    } else {
        return false; // Deletion failed
    }
}


}
?>
