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
    public function profile()
    {
        // Start a session
        session_start();
    
        if (isset($_SESSION['employee_id'])) {
            $id = $_SESSION['employee_id'];
    
            $tdModel = new EmployeeModel();
    
            $profile = $tdModel->getEmployeeDetails($id);
    
            if ($profile) {
                include('views/TrainDriver/profile.php');
            } else {
                echo '<script>alert("Error: Train Driver Not Found!")</script>';
            }
        } else {
            echo '<script>alert("Error: User Not Logged In!")</script>';
        }
    }
  
  public function updateProfile(){
      session_start();

      if(isset($_SESSION['employee_id'])){

          $employee_id=$_SESSION['employee_id'];
          $full_name=$_POST['full_name'];
          $email=$_POST['email'];
          $nic=$_POST['nic'];
          $username=$_POST['username'];

          $tdModel=new EmployeeModel();
          $result=$tdModel->updateEmployee($employee_id,$full_name,$email,$nic,$username);

          if($result){
            echo '<script>alert("Your Details Updated Successfully!");window.location.href="/SlRail/traindriver/dashboard";</script>';
          }
          echo '<script>alert("Error When Updating details! ")</script>';        

      }
  
  }
  public function dashboard(){
      include ('views/TrainDriver/td_dashboard.php');
  }

    public function logout(){
       session_start();

       $tdModel=new EmployeeModel();
       $tdModel->logoutEmployee();

       header("Location:/SlRail/traindriver/login");
    }

  
}