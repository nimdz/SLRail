<?php

require_once 'app/models/Employee/TrainLocationModel.php';
require_once 'app/models/Employee/TrainModel.php';


class TrainController{

    public function addTrain()
    {

        //add form
        session_start();
        include('app/views/StationMaster/sm_add_trains.php');


        //Get warning seeing indicate that certain array keys are not set when trying to access them.to handle these warnings by checking if the keys are set before using them
        $train_number = isset($_POST["trainNum"]) ? $_POST["trainNum"] : null;
        $train_type = isset($_POST["type"]) ? $_POST["type"] : null;
        $capacity = isset($_POST["capacity"]) ? $_POST["capacity"] : null;
        $stoppings = isset($_POST["stoppings"]) ? $_POST["stoppings"] : null;

        // Create an instance of the TrainModel
        $trainModel = new TrainModel();

        // Create a new train 
        $trainResult = $trainModel->createTrain($train_number, $train_type, $capacity, $stoppings);

        if ($trainResult) {
            // creation successful
            echo '<script>alert("Train Added Successfully!"); window.location.href = "/SlRail/stationmaster/dashboard";</script>';
            exit();
        } else {
            // creation failed
            echo "Error: Train added failed.";
        }
        
    }

    public function view(){

        $trainModel=new TrainModel();

        $trains=$trainModel->getAllTrains();

        include('app/views/TrainDriver/alltrains.php');
    
    
    }

  


}