<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Station Master Sidebar</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="stylesheet" href="/SlRail/public/css/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>

<div class="sidebar">
<img width="150px" height="100px" style="margin-left: 40px; margin-top:30px; " src="/SlRail/public/assets/logo.jpg">
     
       <a style="margin-top: 20px;" href="/SlRail/stationmaster/dashboard" class="hover-link <?php echo ($activeLink == 'dashboard') ? 'active' : ''; ?>">
              <span class="material-symbols-outlined">
                  dashboard
                </span>
                  Dashboard
                          
        </a>  

    
      <a href="/SlRail/trainschedule/viewSchedules" class="hover-link <?php echo ($activeLink == 'trainSchedules') ? 'active' : ''; ?>">
           <span class="material-symbols-outlined">
             bookmark
          </span>
             All Train Schedules
          
      </a>     
      

     <a href="/SlRail/trainschedule/addSchedule" class="hover-link <?php echo ($activeLink == 'addSchedule') ? 'active' : ''; ?>">
          <span class="material-symbols-outlined">
            calendar_month
          </span>
          Add Train Schedule
      </a>

     <a href="/SlRail/stationmaster/trainsAdd">
           <span class="material-symbols-outlined">
            campaign
          </span>
          Add Trains              
      </a>

      <a href="/SlRail/announcement/smviewAnnouncement" class="hover-link <?php echo ($activeLink == 'announcements') ? 'active' : ''; ?>">
          <span class="material-symbols-outlined">
              campaign
          </span>
          Announcements
      </a>

      <a href="#">
          <span class="material-symbols-outlined">
              location_on
          </span>
          Track Location
      </a>
  <a href="/SlRail/stationmaster/profile" class="hover-link <?php echo ($activeLink == 'profile') ? 'active' : ''; ?>">
      <span class="material-icons">
      account_circle
      </span>
      Profile
   </a>
   <a href="/SlRail/stationmaster/logout">
          <span class="material-icons">
              logout
          </span>
          Logout
   </a>
       

</div>

</body>