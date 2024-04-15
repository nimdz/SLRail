<?php

require_once 'app/includes/database.php';

class TrainModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function createTrain($train_number, $train_type, $capacity, $available_seats_Class1,$available_seats_Class2,$available_seats_Class3)
    {
        $conn = $this->db->getConnection();

        $sql = "INSERT INTO train (train_number, train_type, capacity,available_seats_Class1,available_seats_Class2,available_seats_Class3) VALUES (?, ?, ?, ?,?,?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error: " . $conn->error);
        }

        $stmt->bind_param("isiiii", $train_number, $train_type, $capacity, $available_seats_Class1,$available_seats_Class2,$available_seats_Class3);

        if ($stmt->execute()) {
            return true; // Added successful
        } else {
            return false; // Added failed
        }
    }
        public function updateTrain($train_number, $train_type, $capacity, $available_seats_Class1, $available_seats_Class2, $available_seats_Class3)
    {
        $conn = $this->db->getConnection();

        // Prepare the SQL statement to update the train's information
        $sql = "UPDATE train SET train_type=?, capacity=?, available_seats_Class1=?, available_seats_Class2=?, available_seats_Class3=? WHERE train_number=?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error: " . $conn->error);
        }

        // Bind parameters and execute the statement
        $stmt->bind_param("siiiii", $train_type, $capacity, $available_seats_Class1, $available_seats_Class2, $available_seats_Class3, $train_number);

        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }
    public function deleteTrain($train_number)
    {
        $conn = $this->db->getConnection();
    
        $sql = "DELETE FROM train WHERE train_number = ?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            die("Error: " . $conn->error);
        }
    
        $stmt->bind_param("i", $train_number);
    
        if ($stmt->execute()) {
            return true; // Deletion successful
        } else {
            return false; // Deletion failed
        }
    }
    
    

    public function getAllTrains()
    {
        $conn = $this->db->getConnection();

        $sql = "SELECT * FROM train";
        $result = $conn->query($sql);

        $trains = array();
        while ($row = $result->fetch_assoc()) {
            $trains[] = $row;
        }

        return $trains;
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

    public function getTrainByNumber($train_number) {
        $conn = $this->db->getConnection();
    
        $sql = "SELECT * FROM train WHERE train_number = ?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            die("Error: " . $conn->error);
        }
    
        $stmt->bind_param("i", $train_number);
    
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                // Fetch train details as an associative array
                return $result->fetch_assoc();
            } else {
                // Train not found
                return null;
            }
        } else {
            // Error executing the statement
            return null;
        }
    }
    
}

?>

