<?php

require_once 'models/Employee/TrainScheduleModel.php';

class TrainScheduleController
{
    public function addSchedule()
    {

        //add form
        session_start();
        include('views/StationMaster/schedule_form.php');

        // Retrieve data from the schedule form
        $departure_station = $_POST["departure_station"];
        $destination_station = $_POST["destination_station"];
        $departure_time = $_POST["departure_time"];
        $arrival_time = $_POST["arrival_time"];
        $schedule_date = $_POST["schedule_date"];

        // Create an instance of the TrainScheduleModel
        $scheduleModel = new TrainScheduleModel();

        // Create a new train schedule
        $scheduleResult = $scheduleModel->createSchedule($departure_station, $destination_station, $departure_time, $arrival_time, $schedule_date);

        if ($scheduleResult) {
            // Schedule creation successful
            echo '<script>alert("Schedule Created Successfully!"); window.location.href = "/SlRail/stationmaster/dashboard";</script>';
            exit();
        } else {
            // Schedule creation failed
            echo "Error: Schedule creation failed.";
        }
    }

    public function viewSchedules()
    {
        // Create an instance of TrainScheduleModel
        $scheduleModel = new TrainScheduleModel();

        // Retrieve all train schedules
        $schedules = $scheduleModel->getAllSchedules();

        // Load the view for displaying schedules
        include('views/StationMaster/allschedules.php');
    }
    public function tdviewSchedules()
    {
        // Create an instance of TrainScheduleModel
        $scheduleModel = new TrainScheduleModel();

        // Retrieve all train schedules
        $schedules = $scheduleModel->getAllSchedules();


         // Load the view for displaying schedules
         include('views/TrainDriver/td_allschedules.php');
       
    }

    public function updateSchedule()
    {
        // Retrieve data from the schedule form
        $scheduleId = $_POST['schedule_id'];
        $departureStation = $_POST["departure_station"];
        $destinationStation = $_POST["destination_station"];
        $departureTime = $_POST["departure_time"];
        $arrivalTime = $_POST["arrival_time"];
        $scheduleDate = $_POST["schedule_date"];

        // Create an instance of the TrainScheduleModel
        $scheduleModel = new TrainScheduleModel();

        // Update the train schedule
        $scheduleResult = $scheduleModel->updateSchedule($scheduleId, $departureStation, $destinationStation, $departureTime, $arrivalTime, $scheduleDate);

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
         include('views/Passenger/trainschedule.php');
    
    }
}