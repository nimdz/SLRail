<?php

require_once 'app/models/Passenger/ReviewModel.php';

class ReviewController{

    public function add(){
      
       session_start();
       include 'app/views/Passenger/feedback.php';

         $full_name=$_POST["full_name"];
         $email=$_POST["email"];
         $title=$_POST["title"];
         $description=$_POST["description"];

         $reviewModel=new ReviewModel();

         $reviewResult=$reviewModel->addReview($full_name,$email,$title,$description);

         if ($reviewResult) {
            // Schedule creation successful
            echo '<script>alert("Review Added Successfully!"); window.location.href = "/SlRail/passenger/dashboard";</script>';
            exit();
        } else {
            // Schedule creation failed
            echo "Error: Review Addition Failed";
        }
      
       
    }
    public function select(){
       session_start();

       include('app/views/Passenger/selectFeedback.php');
    }
    
    public function viewReviews()
    {
        
        // Create an instance of ReviewModel
        $reviewModel=new ReviewModel();

        // Retrieve all reviews
        $reviews = $reviewModel->getAllReviews();

        // Load the view for displaying schedules
        include('app/views/StationMaster/allreviews.php');
    }
    public function pviewReviews()
    {
        
        // Create an instance of ReviewModel
        $reviewModel=new ReviewModel();

        // Retrieve all reviews
        $reviews = $reviewModel->getAllReviews();

        // Load the view for displaying schedules
        include('app/views/Passenger/allreviews.php');
    }

}