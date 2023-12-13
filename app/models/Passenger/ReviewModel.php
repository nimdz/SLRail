<?php

require_once 'app/includes/database.php';

class ReviewModel{

 private $db;

 public function __construct(){
      $this->db=new Database();
 }

 public function addReview($full_name,$email,$title,$description){

    $conn=$this->db->getConnection();

    $sql="INSERT INTO reviews (full_name,email,title,description) VALUES(?,?,?,?)";
    $stmt=$conn->prepare($sql);

    if($stmt === false){
        die ("Error:".$conn->error);
    }

    $stmt->bind_param("ssss",$full_name,$email,$title,$description);
   
    if($stmt->execute()){
        return true;//review added succesfully
    }else{
       return false;
    }
 }
 
}