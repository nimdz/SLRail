<?php

require_once 'app/models/Employee/TrainDelayModel.php';
require_once 'app/models/Employee/EmployeeModel.php';

class TrainDelayController
{

    public function loadForm(){

        $employee_id=$_GET['employee_id'];
         
        $lmModel=new TrainDelayModel();
        $infos=$lmModel->getScheduleInfoForLoggedInUser($employee_id);

        include('app/views/StationMaster/sm_loadForm.php');
      
    }

    public function showDetails(){

        $employee_id=$_POST['employee_id'];
        $station_name=$_POST['station_name'];
        $schedule_id=$_POST['schedule_id'];
      
        $model=new TrainDelayModel();
        $train_times=$model->getTrainTimes($station_name,$schedule_id);

        include('app/views/StationMaster/sm_notify_delays.php');

      
    }

    public function update(){


        $schedule_id = $_POST['schedule_id'];
        $sm_id=$_POST['sm_id'];
        $station_name=$_POST['station_name'];
        $status = $_POST['status'];

        // echo "Schedule ID: " . $_POST['schedule_id'] . "<br>";
        // echo "Station Name: " . $_POST['station_name'] . "<br>";
        // echo "Status: " . $_POST['status'] . "<br>";
        // echo "Employee_id:".$_POST['employee_id']."<br>";

    
        $updateModel = new TrainDelayModel();
        $result = $updateModel->updateStatusAndTime($schedule_id,$sm_id,$station_name, $status);
    
        // Display message based on the result
        if ($result === true) {
            // Success message
            echo '<script>alert("Train Status updated Successfully!"); window.location.href = "/SlRail/stationmaster/dashboard";</script>';
        } else {
            // Failure message
            echo "Failed to update status.";
        }
    }
    
   

    
}
