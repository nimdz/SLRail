<?php

require_once 'app/models/Employee/TrainScheduleModel.php';

class TrainScheduleController
{
    public function addSchedule()
    {
        session_start();
        include('app/views/StationMaster/schedule_form.php');

                // Debug: Print $_POST variables
        // Debug: Print $_POST variables to the browser console
    echo '<script>';
    echo 'console.log(' . json_encode($_POST) . ');';
    echo '</script>';

    
        // Retrieve data from the schedule form
        $departure_station = $_POST["departure_station"];
        $destination_station = $_POST["destination_station"];
        $departure_time = $_POST["departure_time"];
        $arrival_time = $_POST["arrival_time"];
        $train_number = $_POST["train_number"];
        $train_type = $_POST["train_type"];
        $stoppings = $_POST["stoppings"];
    
        // Convert checkbox values to 1 if checked, 0 if unchecked
        $monday = isset($_POST["monday"]) ? 1 : 0;
        $tuesday = isset($_POST["tuesday"]) ? 1 : 0;
        $wednesday = isset($_POST["wednesday"]) ? 1 : 0;
        $thursday = isset($_POST["thursday"]) ? 1 : 0;
        $friday = isset($_POST["friday"]) ? 1 : 0;
        $saturday = isset($_POST["saturday"]) ? 1 : 0;
        $sunday = isset($_POST["sunday"]) ? 1 : 0;
    
        // Create an instance of the TrainScheduleModel
        $scheduleModel = new TrainScheduleModel();
    
        // Create a new train schedule
        $scheduleResult = $scheduleModel->createSchedule(
            $departure_station,
            $destination_station,
            $departure_time,
            $arrival_time,
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
        );
    
        if ($scheduleResult) {
            // Schedule creation successful
            echo '<script>alert("Schedule Created Successfully!"); window.location.href = "/SlRail/stationmaster/dashboard";</script>';
            exit();
        } else {
            // Schedule creation failed
            echo '<script>alert("Error: Schedule creation failed. Make sure the train details are valid.");</script>';
        }
    }

    

    public function viewSchedules()
    {
        // Create an instance of TrainScheduleModel
        $scheduleModel = new TrainScheduleModel();

        // Retrieve all train schedules
        $schedules = $scheduleModel->getAllSchedules();

        // Load the view for displaying schedules
        include('app/views/StationMaster/allschedules.php');
    }
    public function tdviewSchedules()
    {
        // Create an instance of TrainScheduleModel
        $scheduleModel = new TrainScheduleModel();

        // Retrieve all train schedules
        $schedules = $scheduleModel->getAllSchedules();


         // Load the view for displaying schedules
         include('app/views/TrainDriver/td_allschedules.php');
       
    }

    public function updateSchedule()
    {
        // Retrieve data from the schedule form
        $scheduleId = $_POST['schedule_id'];
        $departureStation = $_POST["departure_station"];
        $destinationStation = $_POST["destination_station"];
        $departureTime = $_POST["departure_time"];
        $arrivalTime = $_POST["arrival_time"];
        $trainNumber = $_POST["train_number"];
        $trainType = $_POST["train_type"];
        $stoppings = isset($_POST["stoppings"]) ? $_POST["stoppings"] : array();
    
        // Get days from the form
        $monday = isset($_POST["monday"]) ? 1 : 0;
        $tuesday = isset($_POST["tuesday"]) ? 1 : 0;
        $wednesday = isset($_POST["wednesday"]) ? 1 : 0;
        $thursday = isset($_POST["thursday"]) ? 1 : 0;
        $friday = isset($_POST["friday"]) ? 1 : 0;
        $saturday = isset($_POST["saturday"]) ? 1 : 0;
        $sunday = isset($_POST["sunday"]) ? 1 : 0;
    
        // Create an instance of the TrainScheduleModel
        $scheduleModel = new TrainScheduleModel();
    
        // Update the train schedule
        $scheduleResult = $scheduleModel->updateSchedule(
            $scheduleId,
            $departureStation,
            $destinationStation,
            $departureTime,
            $arrivalTime,
            $trainNumber,
            $trainType,
            $stoppings,
            $monday,
            $tuesday,
            $wednesday,
            $thursday,
            $friday,
            $saturday,
            $sunday
        );
    
        if ($scheduleResult) {
            // Schedule update successful
            echo '<script>alert("Schedule Updated Successfully!"); window.location.href = "/SlRail/stationmaster/dashboard";</script>';
            exit();
        } else {
            // Schedule update failed
            echo "Error: Schedule update failed.";
        }
    }
    
    public function deleteSchedule()
    {
        if (isset($_GET['schedule_id'])) {
            $scheduleId = $_GET['schedule_id'];

            // Validate and process $scheduleId as needed

            // Create an instance of TrainScheduleModel
            $scheduleModel = new TrainScheduleModel();

            if ($scheduleModel->deleteSchedule($scheduleId)) {
                // Deletion successful
                echo '<script>alert("Schedule Deleted Successfully!"); window.location.href = "/SlRail/stationmaster/dashboard";</script>';
                exit();
            } else {
                // Deletion failed
                echo 'Error: Deletion failed.';
            }
        }
    }

    public function showSchedule(){
    
         $scheduleModel=new TrainScheduleModel();
         $schedules=$scheduleModel->getAllSchedules();
         include('app/views/Passenger/trainschedule.php');
    
    }
}