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
    

    public function fetchPrice($departure_station, $destination_station, $seat_class,$number_of_passengers)
    {
        $conn = $this->db->getConnection();
    
        // Construct the trip string
        $trip = $departure_station . " -> " . $destination_station;
    
         //Debug: Output the trip string to console or log
        //echo "Debug: Trip string: $trip<br>";
    
        // Fetch the number of stoppings from train schedules
        $stoppings = $this->getNumberOfStations($departure_station, $destination_station);
         // Debug: Output the number of stoppings
        //echo "Debug: Number of stoppings: $stoppings<br>";
    
        // Calculate fare based on the number of stoppings
        $fare_per_passenger = $this->calculateFare($stoppings, $seat_class);

        // Calculate total fare for all passengers
        $total_fare = $fare_per_passenger * $number_of_passengers;

        // Return the total fare
        return $total_fare;
    }

        private function getNumberOfStations($departure_station, $destination_station)
        {
            try {
                // Get the database connection
                $conn = $this->db->getConnection();

                $line_id = $this->calculateLineId($departure_station);

                
                // Check if destination station is 'Maradana' and line ID is 2
                if ($destination_station == 'Maradana' && $line_id == 1) {
                    // Prepare the SQL query to get the departure station ID
                    $sql = "SELECT station_id FROM Stations WHERE station_name = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $departure_station);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $departure_station_id = $row['station_id'];
                    
                    // Close the statement
                    $stmt->close();
                    
                    // Return the departure station ID incremented by 1
                    return $departure_station_id + 1;
                } else {
                    // Prepare the SQL query to calculate the number of stations
                    $sql = "SELECT (MAX(station_id) - MIN(station_id)) + 1 AS number_of_stations
                            FROM Stations
                            WHERE station_name IN (?, ?)";
                    $stmt = $conn->prepare($sql);
                    
                    // Bind parameters and execute the query
                    $stmt->bind_param("ss", $departure_station, $destination_station);
                    $stmt->execute();
                    
                    // Get the result
                    $result = $stmt->get_result();
                    
                    // Fetch the row
                    $row = $result->fetch_assoc();
                    
                    // Close the statement
                    $stmt->close();
                    
                    // Return the number of stations
                    return $row['number_of_stations'];
                }
            } catch (PDOException $e) {
                // Handle database errors
                echo 'Error: ' . $e->getMessage();
                return false;
            }
        }

private function calculateLineId($departure_station)
{
    try {
        // Get the database connection
        $conn = $this->db->getConnection();
        
        // Prepare the SQL query to get the line ID
        $sql = "SELECT LineID FROM Stations WHERE station_name=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $departure_station);
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
        
        // Fetch the row
        $row = $result->fetch_assoc();
        
        // Close the statement
        $stmt->close();
        
        // Check if the row exists
        if ($row) {
            // Return the LineId
            return $row['LineID'];
        } else {
            // Return a default value or handle the case where LineId is not found
            return 1;
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo 'Error: ' . $e->getMessage();
        return null;
    }
}


public function calculateFare($stoppings, $seat_class)
{
    // Define fare rates and stations per money for each class
    $fareRates = [
        'Class1' => ['rate'=>100,'stations_per_money' => 5],
        'Class2' => ['rate' => 50, 'stations_per_money' => 5],
        'Class3' => ['rate' => 20, 'stations_per_money' => 4],
    ];

    // Check if the seat class is valid
    if (!array_key_exists($seat_class, $fareRates)) {
        // Handle invalid seat class
        return false;
    }



    // For Class1,Class2 and Class3, calculate fare straightforwardly based on stoppings
    $fareRate = $fareRates[$seat_class];
    $fare = ceil($stoppings / $fareRate['stations_per_money']) * $fareRate['rate'];

    return $fare;
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
            $ticket_price = $this->fetchPrice($departure_station, $destination_station, $seat_class,$number_of_passengers);

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
         $sql = "SELECT * FROM bookings WHERE user_id=? ORDER BY booking_timestamp DESC";
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

    public function getticketdetails($booking_id)
    {

         $conn=$this->db->getConnection();
         

         $sql = "SELECT b.*, p.full_name 
                    FROM bookings b 
                    JOIN passenger p ON b.user_id = p.id 
                    WHERE b.booking_id=?";
          $stmt=$conn->prepare($sql);

         if($stmt == false){
              die("Error:".$conn->error);
        }

        $stmt->bind_param('i',$booking_id);
        $stmt->execute();

        $result=$stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch the booking details
            $bookingDetails = $result->fetch_assoc();
            //debugging 
            //echo "Fetched Booking Details: " . print_r($bookingDetails, true) . "<br>";
            return $bookingDetails;
        } else {
            // No booking found with the provided booking_id
            return null;
        }

        
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


public function getBookingsByTrainNumber($trainNumber) {
    $conn = $this->db->getConnection();

    $sql = "SELECT 
                b.booking_id,
                p.username,
                b.train_number,
                b.number_of_passengers,
                b.departure_date,
                b.seat_class,
                b.ticket_price 
            FROM 
                bookings b
            JOIN 
                passenger p ON b.user_id = p.id
            WHERE 
                b.train_number = '$trainNumber' 
            ORDER BY 
                b.booking_id DESC;";

    $result = $conn->query($sql);

    $bookings = array();

    while ($row = $result->fetch_assoc()) {
        $bookings[] = $row;
    }

    return $bookings;
}


public function getBookingCountsForToday()
    {
        $conn = $this->db->getConnection();
        $today = date('Y-m-d');

        $sql = "SELECT seat_class, COUNT(*) as count FROM bookings WHERE departure_date = ? GROUP BY seat_class";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error: " . $conn->error);
        }

        $stmt->bind_param('s', $today);
        $stmt->execute();
        $result = $stmt->get_result();

        $bookingCounts = [];
        while ($row = $result->fetch_assoc()) {
            $bookingCounts[$row['seat_class']] = $row['count'];
        }

        return $bookingCounts;
    }

}
?>

