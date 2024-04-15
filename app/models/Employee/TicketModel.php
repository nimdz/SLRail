<?php

require_once 'app/includes/database.php';

class TicketModel
{
    private $db;

    public function __construct()
    {
        // Create a new instance of the Database class
        $this->db = new Database();
    }

    public function addSeason($user_id, $name, $departure_station, $destination_station, $selected_class, $time_period)
{
    $conn = $this->db->getConnection();

    // Insert data into the 'season' table, including the 'user_id'
    $sql = "INSERT INTO season (user_id, name, departure_station, destination_station, selected_class, time_period) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error: " . $conn->error);
    }

    $stmt->bind_param("isssss", $user_id, $name, $departure_station, $destination_station, $selected_class, $time_period);

    if ($stmt->execute()) {
        // Return the ID of the inserted season record
        return $stmt->insert_id;
    } else {
        return null; // Return null if insertion failed
    }
}

// Function to calculate the season ticket price
public function calculateSeasonTicketPrice($seasonId, $departure_station, $destination_station, $selected_class, $time_period)
{
    
    $conn = $this->db->getConnection();
    $sql = "SELECT * FROM ticketprices WHERE trip = ?";
    // Prepare and execute a query to retrieve the ticket prices for the selected trip
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error: " . $conn->error);
    }
    $stmt->bind_param("isssss", $user_id, $name, $departure_station, $destination_station, $selected_class, $time_period);
    $stmt->bind_param("s", $trip);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the row from the result set
    $row = $result->fetch_assoc();

    // Check if the row exists
    if ($row) {
        // Get the ticket price for the selected class
        $ticketPrice = $row["Class{$selected_class}_price"];

        // Calculate the season ticket price based on the time period
        $seasonTicketPrice = 0;
        if ($time_period == '1 week') {
            $seasonTicketPrice = $ticketPrice * 2 * 7; // Assuming the ticket price is for a one-way trip
        } else if ($time_period == '1 month') {
            $seasonTicketPrice = $ticketPrice * 2 * 7 * 4; // Assuming 4 weeks in a month
        } else if ($time_period == '3 month') {
            $seasonTicketPrice = $ticketPrice * 2 * 7 * 4 * 3; // Assuming 3 months
        }

        // Prepare and execute a query to update the season ticket price in the season table
        $stmt = $conn->prepare("UPDATE season SET season_ticket_price = ? WHERE season_id = ?");
        $stmt->bind_param("ii", $seasonTicketPrice, $seasonId);
        $stmt->execute();

        // Check if the update was successful
        if ($stmt->affected_rows > 0) {
            return $seasonTicketPrice; // Return the calculated season ticket price
        } else {
            return null; // Return null if the update failed
        }
    } else {
        return null; // Return null if the ticket price data is not found
    }
}
    
}
?>