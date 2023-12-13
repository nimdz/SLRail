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

    public function addbooking($user_id, $departure_station, $destination_station, $departure_date, $number_of_passengers)
    {
        $conn = $this->db->getConnection();

        // Insert data into the 'bookings' table, including the 'user_id'
        $sql = "INSERT INTO bookings (user_id, departure_station, destination_station, departure_date, number_of_passengers) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error: " . $conn->error);
        }

        $stmt->bind_param("isssi", $user_id, $departure_station, $destination_station, $departure_date, $number_of_passengers);

        if ($stmt->execute()) {
            return true; // Booking successful
        } else {
            return false; // Booking failed
        }
    }

    public function getAvailableTrains($departure_station,$destination_station){
         $conn=$this->db->getConnection();

         $sql="SELECT * FROM train_schedules WHERE departure_station=? AND destination_station=?";
         $stmt=$conn->prepare($sql);

         if($stmt === false){
             die("Error:".$conn->error);
        }
        $stmt->bind_param("ss",$departure_station,$destination_station);
        $stmt->execute();
        $result=$stmt->get_result();

        $availableTrains=[];

        while($row=$result->fetch_assoc()){
            $availableTrains[]=$row;
        }
        return $availableTrains;
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
    public function updateBooking($booking_id, $departure_station, $destination_station, $departure_date, $number_of_passengers)
{
    $conn = $this->db->getConnection();

    // Update the booking in the 'bookings' table
    $sql = "UPDATE bookings SET departure_station=?, destination_station=?, departure_date=?, number_of_passengers=? WHERE booking_id=?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("sssii", $departure_station, $destination_station, $departure_date, $number_of_passengers, $booking_id);

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
