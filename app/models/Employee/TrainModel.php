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
    
        // Disable foreign key checks
        $conn->query('SET FOREIGN_KEY_CHECKS = 0');
    
        $sql = "DELETE FROM train WHERE train_number = ?";
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            die("Error: " . $conn->error);
        }
    
        $stmt->bind_param("i", $train_number);
    
        if ($stmt->execute()) {
            // Enable foreign key checks
            $conn->query('SET FOREIGN_KEY_CHECKS = 1');
            return true; // Deletion successful
        } else {
            // Enable foreign key checks even if deletion failed
            $conn->query('SET FOREIGN_KEY_CHECKS = 1');
            return false; // Deletion failed
        }
    }
    
    public function loadForm(){
        $conn = $this->db->getConnection();
    
        // Fetch train information
        $train_sql = "SELECT schedule_id,train_number, departure_station, destination_station 
                      FROM train_schedules";
        $train_stmt = $conn->prepare($train_sql);
        $train_stmt->execute();
        $train_result = $train_stmt->get_result();
        $trains = [];
        while ($row = $train_result->fetch_assoc()) {
            $trains[] = $row;
        }
    
        // Fetch employee_id and username
        $employee_sql = "SELECT employee_id, username
                         FROM Employee 
                         WHERE position = 2";
        $employee_stmt = $conn->prepare($employee_sql);
        $employee_stmt->execute();
        $employee_result = $employee_stmt->get_result();
        $employees = [];
        while ($row = $employee_result->fetch_assoc()) {
            $employees[] = $row;
        }
    
        // Return the fetched data
        return [
            'trains' => $trains,
            'employees' => $employees
        ];
    }

    public function AssignDriver($train_number,$schedule_id,$employee_id){

        $conn=$this->db->getConnection();

        $sql="INSERT INTO train_assignment(train_number,schedule_id,employee_id) VALUES(?,?,?)";
        $stmt=$conn->prepare($sql);

        if($stmt == false){
             die("Error:".$conn->error);
        }

        $stmt->bind_param("iii",$train_number,$schedule_id,$employee_id);

        if($stmt->execute()){
            return true;
        }else{
           return false;
        }
    
    
    }
    

    public function getAssignedTrains($employee_id){
        $conn = $this->db->getConnection();
    
        $sql = "SELECT ts.train_number,ts.departure_station, ts.destination_station, ts.arrival_time, ts.departure_time,ts.train_type
                FROM train_schedules ts 
                INNER JOIN train_assignment ta 
                ON ta.schedule_id = ts.schedule_id AND ta.train_number = ts.train_number 
                WHERE ta.employee_id = ?";

       //echo "SQL Query: " . $sql . "<br>";
    
        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);
        
        // Bind the employee_id parameter
        $stmt->bind_param("i", $employee_id);
    
        // Execute the statement
        $stmt->execute();
    
        // Get the result set
        $result = $stmt->get_result();
    
        // Initialize the $trains array
        $trains = array();
    
        // Fetch rows from the result set
        while ($row = $result->fetch_assoc()) {
            // Append each row to the $trains array
            $trains[] = $row;
        }
    
        // Close the statement and connection
        $stmt->close();
        $conn->close();
    
        // Debug: Output the $trains array
       // var_dump($trains);
    
        // Return the $trains array
        return $trains;
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

