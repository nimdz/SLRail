<?php

require_once 'app/models/Employee/TicketModel.php';

class TicketController
{
    

    public function addSeason()
    {
        session_start();
        include('app/views/Passenger/apply_season.php');

        // Check if the user is logged in and get the user's ID
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            // Retrieve data from the season form
            $name = isset($_POST["name"]) ? $_POST["name"] : null;
            $departure_station = isset($_POST["departure_station"]) ? $_POST["departure_station"] : null;
            $destination_station = isset($_POST["destination_station"]) ? $_POST["destination_station"] : null;
            $selected_class = isset($_POST["selected_class"]) ? $_POST["selected_class"] : null;
            $time_period = isset($_POST["time_period"]) ? $_POST["time_period"] : null;

            // Create an instance of the TicketModel
            $ticketModel = new TicketModel();

            // Pass the user_id and other data to the TicketModel
            $seasonId = $ticketModel->addSeason($user_id, $name, $departure_station, $destination_station, $selected_class, $time_period);

            if ($seasonId !== null) {
                // Call the function to calculate the season ticket price
                $seasonTicketPrice = $this->calculateSeasonTicketPrice($seasonId, $departure_station, $destination_station, $selected_class, $time_period);

                if ($seasonTicketPrice !== null) {
                    // Season ticket price calculated successfully
                    echo '<script>alert("Season Added Successfully! Season Ticket Price: RS ' . $seasonTicketPrice . '"); window.location.href = "/SlRail/passenger/dashboard";</script>';
                    exit();
                } else {
                    // Error calculating season ticket price
                    echo "Error: Unable to calculate season ticket price.";
                }
            } else {
                // Error adding season
                echo "Error: Unable to add season.";
            }
        } else {
            // Handle the case where the user is not logged in
            echo "Please log in to make a request.";
        }
    }

    public function calculateSeason()
    {
        session_start();
        include('app/views/TicketingOfficer/to_confirmSeasons.php');
 
        // Retrieve data from the season form
        $name = isset($_POST["name"]) ? $_POST["name"] : null;
        $departure_station = isset($_POST["departure_station"]) ? $_POST["departure_station"] : null;
        $destination_station = isset($_POST["destination_station"]) ? $_POST["destination_station"] : null;
        $selected_class = isset($_POST["selected_class"]) ? $_POST["selected_class"] : null;
        $time_period = isset($_POST["time_period"]) ? $_POST["time_period"] : null;
    
        // Create an instance of the TicketModel
        $ticketModel = new TicketModel();
    
        // Create a new train schedule
        $seasonResult = $ticketModel->calculateSeasonTicketPrice(
            $name,
            $departure_station,
            $destination_station,
            $selected_class,
            $time_period
        );
    
        if ($seasonResult) {
            // Schedule creation successful
            echo '<script>alert("Schedule Created Successfully!"); window.location.href = "/SlRail/ticketingofficer/dashboard";</script>';
            exit();
        } else {
            // Schedule creation failed
            echo '<script>alert("Error: Schedule creation failed. Make sure the train details are valid.");</script>';
        }
    }
}
?>
