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

    public function smviewAnnouncement()
    {
        $ann=new AnnouncementModel();
        $announcements =$ann->getAnnouncement();

        include ('app/views/StationMaster/sm_announcements.php');
    }

    public function updateAnnouncement()
    {
        
        // Retrieve data from the schedule form
        $annId = $_POST['ann_id'];
        $title=$_POST["title"];
        $description=$_POST["description"];
        // Create an instance of the TrainScheduleModel
        $annModel=new AnnouncementModel();
        $annResult=$annModel->updateAnnouncement($annId,$title,$description);
        

        if ($annResult) {
            // Schedule update successful
            echo '<script>alert("Announcement Updated Successfully!"); window.location.href = "/SlRail/stationmaster/dashboard";</script>';
            exit();
        } else {
            // Schedule update failed
            echo "Error: Announcement update failed.";
        }
    }

    public function deleteAnnouncement()
    {
        if (isset($_GET['ann_id'])) {
            $annId = $_GET['ann_id'];


            // Create an instance of TrainScheduleModel
            $annModel=new AnnouncementModel();

            if ($annModel->deleteAnnouncement($annId)) {
                // Deletion successful
                echo '<script>alert("Announcement Deleted Successfully!"); window.location.href = "/SlRail/stationmaster/dashboard";</script>';
                exit();
            } else {
                // Deletion failed
                echo 'Error: Deletion failed.';
            }
        }
    }
    public function toviewAnnouncement()
    {
        $ann=new AnnouncementModel();
        $announcements =$ann->getAnnouncement();

        include ('app/views/TicketingOfficer/to_announcements.php');
    }

}

?>