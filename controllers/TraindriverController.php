<?php

require_once 'models/Employee/EmployeeModel.php';

class TraindriverController{


    public function login(){
    
     session_start();

     include 'views/TrainDriver/td_login.php';

     if($_SERVER['REQUEST_METHOD']==='POST'){
          $username=$_POST['username'];
          $password=$_POST['password'];

          $tdModel=new EmployeeModel();
          $user=$tdModel->loginEmployee($username, $password);

          if($user){
               if($user['position']==="2"){
                   header("Location:/SlRail/traindriver/dashboard");
              }else{
                echo '<script>alert("Error: You do not have the required permission.")</script>';            
             }
           }else{
          echo'<script>alert("Error:Login Failed.Check your credintals.")';
        }
      }
    }

    public function logout(){
       session_start();

       $tdModel=new EmployeeModel();
       $tdModel->logoutEmployee();

       header("Location:/SlRail/traindriver/login");
    }

    public function dashboard(){
        include ('views/TrainDriver/td_dashboard.php');
    }
}