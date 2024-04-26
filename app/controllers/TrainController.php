<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'app/models/Employee/TrainLocationModel.php';
require_once 'app/models/Employee/TrainModel.php';


class TrainController{

    public function addTrain()
    {

        //add form
        session_start();
        include('app/views/Admin/ad_add_trains.php');


        //Get warning seeing indicate that certain array keys are not set when trying to access them.to handle these warnings by checking if the keys are set before using them
        $train_number = isset($_POST["trainNum"]) ? $_POST["trainNum"] : null;
        $train_type = isset($_POST["type"]) ? $_POST["type"] : null;
        $capacity = isset($_POST["capacity"]) ? $_POST["capacity"] : null;
        $available_seats_Class1=isset($_POST["seats_class1"])?$_POST["seats_class1"]:null;
        $available_seats_Class2=isset($_POST["seats_class2"])?$_POST["seats_class2"]:null;
        $available_seats_Class3=isset($_POST["seats_class3"])?$_POST["seats_class3"]:null;

        // Create an instance of the TrainModel
        $trainModel = new TrainModel();

        // Create a new train 
        $trainResult = $trainModel->createTrain($train_number, $train_type, $capacity, $available_seats_Class1,$available_seats_Class2,$available_seats_Class3);

        if ($trainResult) {
            // creation successful
            echo '<script>alert("Train Added Successfully!"); window.location.href = "/SlRail/admin/dashboard";</script>';
            exit();
        } else {
            // creation failed
            echo "Error: Train added failed.";
        }
        
    }

    public function searchTrain()
    {
        // Assuming you get the train number from the form submission
        $train_number = isset($_POST["train_number"]) ? $_POST["train_number"] : null;

        // Create an instance of the TrainModel
        $trainModel = new TrainModel();

        // Retrieve train information by train number
        $trainInfo = $trainModel->getTrainByNumber($train_number);

        // Include the view for displaying the train information
        include('app/views/StationMaster/sm_dashboard_trainInfo.php');
    }

    public function tdview(){
    
        $trainModel=new TrainModel();
    
        $employee_id=isset($_GET["employee_id"]) ? $_GET["employee_id"] : null;
    
        // Debug: Output the employee ID
        //echo "Employee ID: " . $employee_id . "<br>";
    
        $trains=$trainModel->getAssignedTrains($employee_id);
    
        // Debug: Output the $trains array after retrieval
        //var_dump($trains);
    
        include('app/views/TrainDriver/alltrains.php');
    }
    public function adView(){
         
        $trainModel=new TrainModel();

        $trains=$trainModel->getAllTrains();

        include('app/views/Admin/alltrains.php');
    }

    
    public function updateTrain()
    {
 
        
        // Get form data
        $train_number = isset($_POST["train_number"]) ? $_POST["train_number"] : null;
        $train_type = isset($_POST["train_type"]) ? $_POST["train_type"] : null;
        $capacity = isset($_POST["capacity"]) ? $_POST["capacity"] : null;
        $available_seats_Class1 = isset($_POST["seats_class1"]) ? $_POST["seats_class1"] : null;
        $available_seats_Class2 = isset($_POST["seats_class2"]) ? $_POST["seats_class2"] : null;
        $available_seats_Class3 = isset($_POST["seats_class3"]) ? $_POST["seats_class3"] : null;

                // Debug: Output submitted form data
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        // Create an instance of the TrainModel
        $trainModel = new TrainModel();

        // Update train
        $updateResult = $trainModel->updateTrain($train_number, $train_type, $capacity, $available_seats_Class1, $available_seats_Class2, $available_seats_Class3);

        if ($updateResult) {
            // Update successful
            echo '<script>alert("Train Updated Successfully!"); window.location.href = "/SlRail/admin/dashboard";</script>';
            exit();
        } else {
            // Update failed
            echo "Error: Train update failed.";
        }
    }

    public function deleteTrain()
    {
        // Get train_number from the request
        $train_number = isset($_GET["train_number"]) ? $_GET["train_number"] : null;

        // Create an instance of the TrainModel
        $trainModel = new TrainModel();

        // Delete train
        $deleteResult = $trainModel->deleteTrain($train_number);

        if ($deleteResult) {
            // Deletion successful
            echo '<script>alert("Train Deleted Successfully!"); window.location.href = "/SlRail/admin/dashboard";</script>';
            exit();
        } else {
            // Deletion failed
            echo "Error: Train deletion failed.";
        }
    }

    public function loadForm() {
        // Get train_number from the URL parameter
        $train_number = isset($_GET['train_number']) ? $_GET['train_number'] : null;
    
        // Create an instance of the TrainModel
        $trainModel = new TrainModel();
    
        // Get the details of the train by its train number
        $train = $trainModel->getTrainByNumber($train_number);
    
        if ($train) {
            // Pass the train details to the view
            include('app/views/Admin/update_train.php');
        } else {
            // Train not found, handle error
            echo "Error: Train not found.";
        }
    }
    

}
?>
