<?php

require_once 'includes/database.php';

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
}
?>
