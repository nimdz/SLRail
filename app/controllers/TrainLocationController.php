<?php
 
 require_once 'app/models/Employee/TrainLocationModel.php';

 class TrainLocationController{

    public function add()
    {
        session_start();

        include ('app/views/TrainDriver/location_share.php');

        $train_number = $_POST['train_number'];
        $current_city = $_POST['current_city'];
        $last_updated = $_POST['last_updated'];

        $trainModel = new TrainLocationModel();
        $result = $trainModel->addLocation($train_number, $current_city, $last_updated);

        if ($result) {
                echo '<script>alert("Train Location Added Successfully!"); window.location.href = "/SlRail/traindriver/dashboard";</script>';
        } else {
                echo "Error: Location cannot be updated now.";
            }
    }
    public function view(){
    
        session_start();

        $train_number=$_POST['train_number'];

        $trainlocationModel=new TrainLocationModel();

        $trainLocation=$trainlocationModel->getLocation($train_number);

        if (!empty($trainLocation)) {
            // Display the train location details
            include('app/views/Passenger/trainlocation.php');

          } else {
            echo "Train location not found.";
        }
    }




}