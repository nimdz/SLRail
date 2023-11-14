<?php

require_once 'includes/database.php';

class ReviewModel{

 private $db;

 public function __construct(){
      $this->db=new Database();
 }

 public function addReview($review_id,$full_name,$email,$title,$description){

    $conn=$this->db->getConnection();

    $sql="INSERT INTO Reviews (review_id,full_name,email,title,description)";
    $stmt=$conn->prepare($sql);

    if($stmt === false){
        die ("Error:".$conn->error);
    }

    $stmt->bind_param("issss",$review_id,$full_name,$email,$title,$description);
   
    if($stmt->execute()){
        return true;//review added succesfully
    }else{
       return false;
    }
 }
}