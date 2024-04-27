<?php

require_once 'app/includes/database.php';

class TrainScheduleModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function createSchedule($departure_station,$destination_station,$departure_time,$arrival_time,$train_number,$train_type,$stoppings,$monday,$tuesday,$wednesday,$thursday,$friday,$saturday,$sunday,$route)
    {
        $conn = $this->db->getConnection();
    
        $sql = "INSERT INTO train_schedules(departure_station,destination_station,departure_time,arrival_time,train_number,train_type,stoppings,monday,tuesday,wednesday,thursday,friday,saturday,sunday,route) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            die("Error: " . $conn->error);
        }
    
        $stmt->bind_param("ssssissiiiiiiis", $departure_station, $destination_station, $departure_time, $arrival_time, $train_number, $train_type, $stoppings, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday,$route);
    
        // Debug: Print the SQL query and parameters
        echo "SQL: " . $sql . "<br>";
        echo "Parameters: " . implode(", ", array($departure_station, $destination_station, $departure_time, $arrival_time, $train_number, $train_type, $stoppings, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday,$route)) . "<br>";
    
        if ($stmt->execute()) {
            return true; // Schedule creation successful
        } else {
            // Debug: Print any SQL error
            echo "Error: " . $stmt->error;
            return false; // Schedule creation failed
        }
    }
    
    
    public function getAvailableTrains($departure_station, $destination_station) {
        $conn = $this->db->getConnection();
    
        // First query to fetch train_number and train_type
        $sql_trains = "SELECT train_number,departure_station,destination_station,train_type,monday,tuesday,wednesday,thursday,friday,saturday,sunday
                       FROM train_schedules
                       WHERE (departure_station = ? AND destination_station = ?)
                       OR (stoppings LIKE CONCAT('%', ?, '%', ?, '%'))
                       ORDER BY departure_time ASC";
    
        // Debugging
        //echo "First SQL query: $sql_trains with parameters: $departure_station, $destination_station, $departure_station, $destination_station";
    
        $stmt_trains = $conn->prepare($sql_trains);
    
        if ($stmt_trains === false) {
            die("Error preparing statement for trains: " . $conn->error);
        }
    
        // Only bind each parameter once
        $stmt_trains->bind_param("ssss", $departure_station, $destination_station, $departure_station, $destination_station);
        
        if (!$stmt_trains->execute()) {
            die("Error executing statement for trains: " . $stmt_trains->error);
        }
    
        $result_trains = $stmt_trains->get_result();
    
        $availableTrains = [];
    
        while ($row = $result_trains->fetch_assoc()) {
            // Save train_number and train_type
            $train_info = [
                'train_number' => $row['train_number'],
                'departure_station'=>$row['departure_station'],
                'destination_station'=>$row['destination_station'],
                'train_type' => $row['train_type'],
                 'monday' =>$row['monday'],
                 'tuesday' =>$row['tuesday'],
                 'wednesday' =>$row['wednesday'],
                 'thursday' =>$row['thursday'],
                 'friday' =>$row['friday'],
                 'saturday' =>$row['saturday'],
                 'sunday' =>$row['sunday'],
                'stoppings' => []
            ];
    
            $availableTrains[] = $train_info;
        }
    
        // Second query to fetch stop times
        foreach ($availableTrains as  &$train) {
        
                $sql_stoppings = "SELECT ts.station_name, ts.arrival_time, ts.departure_time
                                    FROM train_stoppings ts
                                    INNER JOIN train_schedules sch ON ts.schedule_id = sch.schedule_id
                                    WHERE sch.train_number = ?;";

            // Debugging
            //echo "Second SQL query: $sql_stoppings with parameter: " . $train['train_number'] . PHP_EOL;
            $stmt_stoppings = $conn->prepare($sql_stoppings);
    
            if ($stmt_stoppings === false) {
                die("Error preparing statement for stoppings: " . $conn->error);
            }
    
            // Only bind each parameter once
            $stmt_stoppings->bind_param("i", $train['train_number']);
            
            if (!$stmt_stoppings->execute()) {
                die("Error executing statement for stoppings: " . $stmt_stoppings->error);
            }
    
            $result_stoppings = $stmt_stoppings->get_result();
    
            while ($row = $result_stoppings->fetch_assoc()) {
                // Save stopping details
                $train['stoppings'][] = [
                    'station_name' => $row['station_name'],
                    'arrival_time' => $row['arrival_time'],
                    'departure_time' => $row['departure_time']
                ];
                //debugging
                //echo "Departure time: " . $row['departure_time'] . ", Arrival time: " . $row['arrival_time'] . ", Stopping name: " . $row['stopping_name'] . PHP_EOL;

            }
        }
    
        return $availableTrains;
    }

    public function getTrains_booking($departure_station, $destination_station, $date) {

        $conn = $this->db->getConnection();
        $day = date('l', strtotime($date));
    
        $sql = "SELECT train_number,schedule_id,departure_station, destination_station, train_type, monday, tuesday, wednesday, thursday, friday, saturday, sunday
                    FROM train_schedules
                    WHERE (($day = 1 AND departure_station = ? AND destination_station = ?))
                    OR (($day = 1 AND stoppings LIKE CONCAT('%', ?, '%', ?, '%')))
                    ORDER BY departure_time ASC";
                
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $departure_station, $destination_station, $departure_station, $destination_station);
        
        $stmt->execute();
        $result = $stmt->get_result();
        $availableTrains = [];
    
        while ($row = $result->fetch_assoc()) {
            $availableTrains[] = [
                'train_number' => $row['train_number'],
                'schedule_id' => $row['schedule_id'],
                'departure_station' => $row['departure_station'],
                'destination_station' => $row['destination_station'],
                'train_type' => $row['train_type'],
                'monday' => $row['monday'],
                'tuesday' => $row['tuesday'],
                'wednesday' => $row['wednesday'],
                'thursday' => $row['thursday'],
                'friday' => $row['friday'],
                'saturday' => $row['saturday'],
                'sunday' => $row['sunday'],
                'stoppings' => [],
            ];
        }
    
        foreach ($availableTrains as &$train) {

            $sql_stoppings = "SELECT ts.station_name, ts.arrival_time, ts.departure_time
                              FROM train_stoppings ts
                              INNER JOIN train_schedules sch ON ts.schedule_id = sch.schedule_id
                              WHERE sch.train_number = ?";

            $stmt_stoppings = $conn->prepare($sql_stoppings);

            $stmt_stoppings->bind_param("i", $train['train_number']);

            $stmt_stoppings->execute();

            $result_stoppings = $stmt_stoppings->get_result();
    
            while ($row = $result_stoppings->fetch_assoc()) {
                $train['stoppings'][] = [
                    'station_name' => $row['station_name'],
                    'arrival_time' => $row['arrival_time'],
                    'departure_time' => $row['departure_time']
                ];
            }
        }
    
        return $availableTrains;
    }
    
    public function showStoppings($train_number){

        $conn=$this->db->getConnection();

        $sql = "SELECT ts.station_name, ts.arrival_time, ts.departure_time,ts.status,ts.update_time
                                    FROM train_stoppings ts
                                    INNER JOIN train_schedules sch ON ts.schedule_id = sch.schedule_id
                                    WHERE sch.train_number = ?;";
        
        $stmt=$conn->prepare($sql);

        if ($stmt === false) {
            die("Error preparing statement for stoppings: " . $conn->error);
        }
    
        $stmt->bind_param("i", $train_number);
    
        if (!$stmt->execute()) {
            die("Error executing statement for stoppings: " . $stmt->error);
        }
    
        $result = $stmt->get_result();
        $stoppings = [];
    
        while ($row = $result->fetch_assoc()) {
            $stoppings[] = $row;
        }
    
        return $stoppings;
                    
     
    }
    public function getStationsByRoute($route)
    {
        $conn = $this->db->getConnection();
        $sql = "SELECT station_name FROM stations WHERE LineId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $route);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Fetch the rows from the result set
        $stations = [];
        while ($row = $result->fetch_assoc()) {
            $stations[] = $row['station_name'];
        }
    
        // Add default stations for the route
        if ($route == 1) {
            array_unshift($stations,  'Choose Station','Maradana');
        } elseif ($route == 2) {
            array_unshift($stations, 'Choose Station', 'Colombo Fort', 'Maradana');
        }elseif ($route == 3) {
            array_unshift($stations, 'Choose Station', 'Colombo Fort', 'Maradana');
        }elseif ($route == 4) {
            array_unshift($stations, 'Choose Station', 'Colombo Fort', 'Maradana');
        }elseif ($route == 5) {
            array_unshift($stations, 'Choose Station', 'Colombo Fort', 'Maradana');
        }
    
        // Close the statement
        $stmt->close();
        return $stations;
    }
    
    public function getSchedules() {

        $conn = $this->db->getConnection();

        $sql = "SELECT * FROM train_schedules ORDER BY departure_time ASC";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            die("Error preparing statement for schedules: " . $conn->error);
        }
    
        if (!$stmt->execute()) {
            die("Error executing statement for schedules: " . $stmt->error);
        }
    
        $result = $stmt->get_result();
    
        $schedules = array();
    
        while ($row = $result->fetch_assoc()) {
            $schedules[] = $row; // Append each row to the $schedules array
        }
    
        $stmt->close();
        return $schedules;
    }
    
    

    

    public function getAllSchedules($route)
{
    $conn = $this->db->getConnection();

    $sql = "SELECT * FROM train_schedules WHERE route=? ORDER BY departure_time ASC";

    $stmt = $conn->prepare($sql);

    if ($stmt == false) {
        die("Error preparing statement for schedules" . $conn->error);
    }

    // Bind the parameter directly to the statement
    $stmt->bind_param("s", $route);

    // Execute the prepared statement
    $stmt->execute();

    // Get the result set from the prepared statement
    $result = $stmt->get_result();

    // Fetch the rows from the result set
    $schedules = array();
    while ($row = $result->fetch_assoc()) {
        $schedules[] = $row;
    }

    // Close the statement
    $stmt->close();

    return $schedules;
}


    public function getScheduleById($scheduleId)
    {
        $conn = $this->db->getConnection();

        $sql = "SELECT * FROM train_schedules WHERE schedule_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error: " . $conn->error);
        }

        $stmt->bind_param('i', $scheduleId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function updateSchedule(
        $scheduleId,
        $departureStation,
        $destinationStation,
        $departureTime,
        $arrivalTime,
        $train_number,
        $train_type,
        $stoppings,
        $monday,
        $tuesday,
        $wednesday,
        $thursday,
        $friday,
        $saturday,
        $sunday,
        $route
    ) {
        $conn = $this->db->getConnection();
    
        $sql = "UPDATE train_schedules SET
            departure_station=?,
            destination_station=?,
            departure_time=?,
            arrival_time=?,
            train_number=?,
            train_type=?,
            stoppings=?,
            monday=?,
            tuesday=?,
            wednesday=?,
            thursday=?,
            friday=?,
            saturday=?,
            sunday=?,
            route=?
            WHERE schedule_id=?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            die("Error: " . $conn->error);
        }
    
        $stmt->bind_param(
            "ssssissiiiiiiiis",
            $departureStation,
            $destinationStation,
            $departureTime,
            $arrivalTime,
            $train_number,
            $train_type,
            $stoppings,
            $monday,
            $tuesday,
            $wednesday,
            $thursday,
            $friday,
            $saturday,
            $sunday,
            $scheduleId,
            $route
        );
    
        if ($stmt->execute()) {
            return true; // Schedule update successful
        } else {
            return false; // Schedule update failed
        }
    }
    

    public function deleteSchedule($scheduleId)
    {
        $conn = $this->db->getConnection();

        $sql = "DELETE FROM train_schedules WHERE schedule_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error: " . $conn->error);
        }

        $stmt->bind_param("i", $scheduleId);

        if ($stmt->execute()) {
            return true; // Schedule deletion successful
        } else {
            return false; // Schedule deletion failed
        }
    }
    
}
?>
