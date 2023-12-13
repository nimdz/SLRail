<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrainDriver Dashboard</title>
    <link rel="stylesheet" href="/SlRail/public/css/dashboard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    
    <div class="sidebar">

      <a href="#"><img width="100px" src="/SlRail/public/assets/logo.jpg"> </a>

      <a href="/SlRail/traindriver/dashboard">
                 <span class="material-symbols-outlined">
                   dashboard
                </span>
                    Dashboard
                
            </a>

          
            <a href="/SlRail/trainschedule/tdviewSchedules">
                 <span class="material-symbols-outlined">
                   bookmark
                </span>
                    Train Schedule
                
            </a>     
            
    
           <a href="/SlRail/announcement/tdaddAnnouncement">
                <span class="material-symbols-outlined">
                campaign                
                </span>
                  Announcements           
            </a>
    
            <a href="/SlRail/traindriver/shareLocation">
                <span class="material-symbols-outlined">
                    location_on
                </span>
                Share Location
            </a>

            <a href="#">
                <span class="material-symbols-outlined">
                campaign                
                </span>
                 Messages           
            </a>
        <a href="/SlRail/traindriver/profile">
            <span class="material-icons">
            account_circle
            </span>
            Profile
         </a>
         <a href="/SlRail/traindriver/logout">
                <span class="material-icons">
                    logout
                </span>
                Logout
           <a>
             
      
    </div>
  <?php include('includes/header.php');?>

    <div class="content">
      <h1> <center>Welcome Train Driver! </center></Welcome></h1>
      <p>"Welcome to the Train Driver Console, your central control center for operating our railway network. 
        As a train driver, you are the driving force behind the smooth and safe transportation of our passengers.
        From this console, you have the tools to manage your driver profile, receive important route and schedule
         information, and report any issues or emergencies. You can also access real-time data on train conditions, 
         track locations, and communicate with station masters and control centers. This comprehensive set of features
          empowers you to ensure the reliability and safety of our railway system. Feel free to navigate through the menu 
          on the left to access these functionalities and streamline your daily tasks. We are committed to providing you 
          with the tools and support needed to carry out your role as a dedicated train driver, contributing to a reliable
           and efficient railway service for all passengers." 
     </p>
   </div>
  <?php include('includes/footer.php'); ?>
    
</body>
</html>