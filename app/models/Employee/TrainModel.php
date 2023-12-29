<?php

require_once 'app/includes/database.php';

class TrainModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function createTrain($train_number, $train_type, $capacity, $stoppings)
    {
        $conn = $this->db->getConnection();

        $sql = "INSERT INTO train (train_number, train_type, capacity, stoppings) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error: " . $conn->error);
        }

        $stmt->bind_param("isis", $train_number, $train_type, $capacity, $stoppings);

        if ($stmt->execute()) {
            return true; // Added successful
        } else {
            return false; // Added failed
        }
    }

    public function getTrainByNumber($train_number)
    {
        $conn = $this->db->getConnection();

        $sql = "SELECT train_number, train_type, capacity, stoppings FROM train WHERE train_number = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error: " . $conn->error);
        }

        $stmt->bind_param("i", $train_number);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null; // No matching train found
        }
    }
}
?>
