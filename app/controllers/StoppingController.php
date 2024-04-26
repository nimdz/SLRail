<?php

require_once('app/models/Employee/StoppingModel.php');


class StoppingController{



    public function addStopping() {
        // Create an instance of StoppingModel
        $stoppingModel = new StoppingModel();
    
        // Fetch schedule details from the StoppingModel
        $schedules = $stoppingModel->getScheduleData();
    
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the selected schedule ID from the form
            $scheduleId = $_POST["schedule_id"];
            // Get other stopping details from the form
            $stationName = $_POST["station_name"];
            $arrivalTime = $_POST["arrival_time"];
            $departureTime = $_POST["departure_time"];
    
            // Call the addStopping method to add the stopping details
            $result = $stoppingModel->addStopping($scheduleId, $stationName, $arrivalTime, $departureTime);
    
            if ($result) {
                // Stopping details added successfully
                echo '<script>alert("Stopping details added successfully!"); window.location.href = "/SlRail/stopping/addStopping";</script>';
                exit();
            } else {
                // Failed to add stopping details
                echo '<script>alert("Error: Failed to add stopping details. Please try again.");</script>';
            }
        }
    
        // Include the view to display the form
        include('app/views/Admin/addStoppings.php');
    }
    public function getStoppingsByScheduleId()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET["schedule_id"])) {
                $scheduleId = $_GET["schedule_id"];

                // Create an instance of StoppingModel
                $stoppingModel = new StoppingModel();

                // Fetch stoppings by schedule ID
                $stoppings = $stoppingModel->getStoppingsByScheduleId($scheduleId);

                // Return JSON response
                header('Content-Type: application/json');
                echo json_encode($stoppings);
                exit();
            }
        }
    }
    public function selectSchedule() {
        // Create an instance of StoppingModel
        $stoppingModel = new StoppingModel();
        
        // Fetch all schedules
        $schedules = $stoppingModel->getScheduleData();
        
        // Load the view
        include('app/views/Admin/selectSchedule.php');
    }
    
    public function displayStoppings() {
        // Check if the schedule ID is provided
        if (isset($_GET['schedule_id'])) {
            $scheduleId = $_GET['schedule_id'];
            
            // Create an instance of StoppingModel
            $stoppingModel = new StoppingModel();
            
            // Fetch stoppings corresponding to the selected schedule
            $stoppings = $stoppingModel->getStoppings($scheduleId);
            
            // Load the view
            include('app/views/Admin/displayStoppings.php');
        } else {
            // If schedule ID is not provided, redirect to the select schedule page
            header("Location: /SlRail/stopping/selectSchedule");
            exit();
        }
    }

    public function updateStopping() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $stoppingId = $_POST["stopping_id"];
            $stationName = $_POST["station_name"];
            $arrivalTime = $_POST["arrival_time"];
            $departureTime = $_POST["departure_time"];
            $stoppingModel = new StoppingModel();
            $result = $stoppingModel->updateStopping($stoppingId, $stationName, $arrivalTime, $departureTime);
            if ($result) {
                echo '<script>alert("Stopping details updated successfully!"); window.location.href = "/SlRail/stopping/displayStoppings";</script>';
                exit();
            } else {
                echo '<script>alert("Error: Failed to update stopping details. Please try again.");</script>';
            }
        }
    }

    public function deleteStopping() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $stoppingId = $_POST["stopping_id"];
            $stoppingModel = new StoppingModel();
            $result = $stoppingModel->deleteStopping($stoppingId);
            if ($result) {
                echo '<script>alert("Stopping deleted successfully!"); window.location.href = "/SlRail/admin/dashboard";</script>';
                exit();
            } else {
                echo '<script>alert("Error: Failed to delete stopping. Please try again.");</script>';
            }
        }
    }
    public function getScheduleInfo() {
        // Create an instance of StoppingModel
        $stoppingModel = new StoppingModel();
        
        // Fetch all schedules
        $schedules = $stoppingModel->getScheduleData();
        
        // Load the view
        include('app/views/Admin/ad_formtrainincome.php');
    }
    
        



}