<?php

require_once 'app/includes/database.php';

class TrainScheduleModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function createSchedule($departure_station, $destination_station, $departure_time, $arrival_time, $train_number, $train_type, $stoppings, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday)
    {
        $conn = $this->db->getConnection();
    
        $sql = "INSERT INTO train_schedules (departure_station, destination_station, departure_time, arrival_time, train_number, train_type, stoppings, monday, tuesday, wednesday, thursday, friday, saturday, sunday) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            die("Error: " . $conn->error);
        }
    
        $stmt->bind_param("ssssissiiiiiii", $departure_station, $destination_station, $departure_time, $arrival_time, $train_number, $train_type, $stoppings, $monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday);
    
        if ($stmt->execute()) {
            return true; // Schedule creation successful
        } else {
            return false; // Schedule creation failed
        }
    }
    
    
    public function getAvailableTrains($departure_station, $destination_station) {
        $conn = $this->db->getConnection();
    
        // First query to fetch train_number and train_type
        $sql_trains = "SELECT train_number, train_type
                       FROM train_schedules
                       WHERE (departure_station = ? AND destination_station = ?)
                       OR (stoppings LIKE CONCAT('%', ?, '%', ?, '%'))
                       ORDER BY departure_time ASC";
    
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
                'train_type' => $row['train_type'],
                'stoppings' => []
            ];
    
            $availableTrains[] = $train_info;
        }
    
        // Second query to fetch stop times
        foreach ($availableTrains as &$train) {
            $sql_stoppings = "SELECT station_name, arrival_time, departure_time
                              FROM train_stoppings
                              WHERE schedule_id = (SELECT schedule_id FROM train_schedules WHERE train_number = ?)";
    
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
            }
        }
    
        return $availableTrains;
    }
    

    

    public function getAllSchedules()
    {
        $conn = $this->db->getConnection();

        $sql = "SELECT * FROM train_schedules";
        $result = $conn->query($sql);

        $schedules = array();
        while ($row = $result->fetch_assoc()) {
            $schedules[] = $row;
        }

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
        $sunday
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
            sunday=?
            WHERE schedule_id=?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            die("Error: " . $conn->error);
        }
    
        $stmt->bind_param(
            "sssssiiiiiiiiiii",
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
            $scheduleId
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
