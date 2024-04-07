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

    public function getAvailableTrains($departure_station, $destination_station) {
        // Your code for getAvailableTrains goes here
    }
}

?>
