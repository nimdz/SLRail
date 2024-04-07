<?php

require_once 'app/models/Employee/TrainScheduleModel.php';

class TrainScheduleController
{
    public function addSchedule()
    {
        session_start();
        include('app/views/StationMaster/schedule_form.php');

        $departure_station = isset($_POST["departure_station"]) ? $_POST["departure_station"] : null;
        $destination_station = isset($_POST["destination_station"]) ? $_POST["destination_station"] : null;
        $departure_time = isset($_POST["departure_time"]) ? $_POST["departure_time"] : null;
        $arrival_time = isset($_POST["arrival_time"]) ? $_POST["arrival_time"] : null;
        $schedule_date = isset($_POST["schedule_date"]) ? $_POST["schedule_date"] : null;
        $train_number = isset($_POST["train_number"]) ? $_POST["train_number"] : null;
        $train_type = isset($_POST["train_type"]) ? $_POST["train_type"] : null;

        $scheduleModel = new TrainScheduleModel();

        $scheduleResult = $scheduleModel->createSchedule($departure_station, $destination_station, $departure_time, $arrival_time, $schedule_date, $train_number, $train_type);

        if ($scheduleResult) {
            echo '<script>alert("Schedule Created Successfully!"); window.location.href = "/SlRail/stationmaster/dashboard";</script>';
            exit();
        } else {
            echo '<script>alert("Error: Schedule creation failed.");</script>';
        }
    }

    public function viewSchedules()
    {
        $scheduleModel = new TrainScheduleModel();

        $schedules = $scheduleModel->getAllSchedules();

        include('app/views/StationMaster/allschedules.php');
    }

    public function tdviewSchedules()
    {
        $scheduleModel = new TrainScheduleModel();

        $schedules = $scheduleModel->getAllSchedules();

        include('app/views/TrainDriver/td_allschedules.php');
    }

    public function updateSchedule()
    {
        $scheduleId = $_POST['schedule_id'];
        $departureStation = $_POST["departure_station"];
        $destinationStation = $_POST["destination_station"];
        $departureTime = $_POST["departure_time"];
        $arrivalTime = $_POST["arrival_time"];
        $trainNumber = $_POST["train_number"];
        $trainType = $_POST["train_type"];
        $stoppings = isset($_POST["stoppings"]) ? $_POST["stoppings"] : array();

        $scheduleModel = new TrainScheduleModel();

        $scheduleResult = $scheduleModel->updateSchedule(
            $scheduleId,
            $departureStation,
            $destinationStation,
            $departureTime,
            $arrivalTime,
            $trainNumber,
            $trainType,
            $stoppings
        );

        if ($scheduleResult) {
            echo '<script>alert("Schedule Updated Successfully!"); window.location.href = "/SlRail/stationmaster/dashboard";</script>';
            exit();
        } else {
            echo "Error: Schedule update failed.";
        }
    }

    public function deleteSchedule()
    {
        if (isset($_GET['schedule_id'])) {
            $scheduleId = $_GET['schedule_id'];

            $scheduleModel = new TrainScheduleModel();

            if ($scheduleModel->deleteSchedule($scheduleId)) {
                echo '<script>alert("Schedule Deleted Successfully!"); window.location.href = "/SlRail/stationmaster/dashboard";</script>';
                exit();
            } else {
                echo 'Error: Deletion failed.';
            }
        }
    }

    public function showSchedule()
    {
        $scheduleModel = new TrainScheduleModel();
        $schedules = $scheduleModel->getAllSchedules();
        include('app/views/Passenger/trainschedule.php');
    }

    public function filter()
    {
        $departure_station = isset($_GET["departure_station"]) ? $_GET["departure_station"] : '';
        $destination_station = isset($_GET["destination_station"]) ? $_GET["destination_station"] : '';

        $searchModel = new TrainScheduleModel();
        $availabletrains = $searchModel->getAvailableTrains($departure_station, $destination_station);

        include('app/views/Passenger/filter_schedule.php');
    }
}
