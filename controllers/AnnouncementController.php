<?php

require_once 'models/Employee/AnnouncementModel.php';

class AnnouncementController{
   
    public function addAnnouncement(){

        session_start();

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

    public function viewAnnouncement(){
        
        $ann=new AnnouncementModel();
        $announcements =$ann->getAnnouncement();

        include ('views/Passenger/announcements.php');
    
    }
}

?>