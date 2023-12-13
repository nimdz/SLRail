<?php

require_once 'app/models/Employee/AnnouncementModel.php';

class AnnouncementController{
   
    public function addAnnouncement(){

        session_start();

        include 'app/views/StationMaster/announcement_add.php';


        $title=$_POST["title"];
        $description=$_POST["description"];

        $annModel=new AnnouncementModel();
        $annResult=$annModel->addAnnouncement($title,$description);

        if($annResult){
            echo '<script>alert("Announcement Added Successfully!"); window.location.href = "/SlRail/stationmaster/dashboard";</script>';
        }else{
            echo '<script>alert("Error: Review Addition Failed");window.location.href=",/SlRail/stationmaster/dashboard";</script>';

        }
    
    
    }
    public function tdaddAnnouncement(){

        session_start();

        include 'app/views/TrainDriver/announcement_add.php';


        $title=$_POST["title"];
        $description=$_POST["description"];

        $annModel=new AnnouncementModel();
        $annResult=$annModel->addAnnouncement($title,$description);

        if($annResult){
            echo '<script>alert("Announcement Added Successfully!"); window.location.href = "/SlRail/traindriver/dashboard";</script>';
        }else{
            echo '<script>alert("Error: Review Addition Failed");window.location.href=",/SlRail/traindriver/dashboard";</script>';

        }
    
    
    }

    public function viewAnnouncement(){
        
        $ann=new AnnouncementModel();
        $announcements =$ann->getAnnouncement();

        include ('app/views/Passenger/announcements.php');
    
    }
}

?>