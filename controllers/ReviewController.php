<?php

require_once 'models/Passenger/ReviewModel.php';

class ReviewController{

    public function add(){
      session_start();
      include 'views/Passenger/feedback.php';

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

}