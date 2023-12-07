<?php

require_once 'models/Employee/EmployeeModel.php';

class TicketingOfficerController
{
    public function logout(){
      session_start();

      $smModel=new EmployeeModel();
      $smModel->logoutEmployee();

      header("Location:/SlRail/home/login");

    }

    public function dashboard(){
         include ('views/TicketingOfficer/to_dashboard.php');
    }
}