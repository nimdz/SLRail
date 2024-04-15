<?php

require_once 'app/includes/database.php';

class TrainDelayModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getScheduleInfoForLoggedInUser($employee_id)
{
    // Get database connection
    $conn = $this->db->getConnection();

    // Step 1: Get station_name from employee_id
    $query1 = "SELECT station_name,employee_id FROM assign_station WHERE employee_id = ?";
    $stmt1 = $conn->prepare($query1);
    $stmt1->bind_param("i", $employee_id);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $station_name_row = $result1->fetch_assoc(); // Assuming only one station per employee
    $station_name = $station_name_row['station_name'];

    // Step 2: Get schedule_id where stoppings contain station_name
    $query2 = "SELECT schedule_id, train_number, departure_station, destination_station FROM train_schedules WHERE stoppings LIKE ?";
    $stmt2 = $conn->prepare($query2);
    $station_name_like = "%$station_name%";
    $stmt2->bind_param("s", $station_name_like);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    // Prepare the result data
    $schedule_info = array(
        'station_name' => $station_name,
        'employee_id' =>$employee_id,
        'schedules' => $result2->fetch_all(MYSQLI_ASSOC)
    );

    return $schedule_info; // This will contain the station name and schedule information
}
public function getTrainTimes($station_name, $schedule_id)
{
    // Get database connection
    $conn = $this->db->getConnection();

    // Prepare the query to fetch arrival time and departure time
    $query = "SELECT arrival_time, departure_time,schedule_id,station_name FROM train_stoppings WHERE station_name = ? AND schedule_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $station_name, $schedule_id);
    
    // Execute the query
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    // Fetch the data
    $train_times = $result->fetch_assoc();

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Return the fetched data
    return $train_times;
}
public function updateStatusAndTime($schedule_id, $sm_id, $station_name, $status)
{
    // Get database connection
    $conn = $this->db->getConnection();

    // Prepare the query to update status and update_time
    $query = "UPDATE train_stoppings SET status = ?, sm_id = ? WHERE schedule_id = ? AND station_name LIKE ?";
    $stmt = $conn->prepare($query);
    
    // Bind parameters to the query
    $stmt->bind_param("siis", $status, $sm_id, $schedule_id, $station_name);
    
    // Execute the query
    if ($stmt->execute()) {
        // If execution is successful, return true
        return true; // Schedule update successful
    } else {
        // If execution fails, return false
        return false; // Schedule update failed
    }
}




    
    

}
