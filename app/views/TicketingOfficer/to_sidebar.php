<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketingOfficer Sidebar</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="stylesheet" href="/SlRail/public/css/TicketingOfficer/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>

<div class="sidebar">
<img width="150px" height="100px" style="margin-left: 40px; margin-top:30px; " src="/SlRail/public/assets/logo.jpg">


<a style="margin-top: 20px;" href="/SlRail/ticketingofficer/dashboard" class="hover-link <?php echo ($activeLink == 'dashboard') ? 'active' : ''; ?>">
                 <span class="material-symbols-outlined">
                   dashboard
                </span>
                    Dashboard
                
            </a>

    
<a href="/SlRail/trainschedule/toviewSchedules" class="hover-link <?php echo ($activeLink == 'allSchedules') ? 'active' : ''; ?>">
           <span class="material-symbols-outlined">
             bookmark
          </span>
              Train Schedule
          
      </a>     
      

     <a href="/SlRail/announcement/toviewAnnouncement" class="hover-link <?php echo ($activeLink == 'announcements') ? 'active' : ''; ?>">
          <span class="material-symbols-outlined">
          campaign                
          </span>
            Announcement           
      </a>


      <a href="#">
          <span class="material-symbols-outlined">
          Book              
          </span>
           Bookings           
      </a>

      <a href="#" class="hover-link <?php echo ($activeLink == 'refunds') ? 'active' : ''; ?>">
      <span class="material-icons">
      currency_exchange
      </span>
      Refunds
   </a>

  <a href="/SlRail/ticketingofficer/profile" class="hover-link <?php echo ($activeLink == 'profile') ? 'active' : ''; ?>">
      <span class="material-icons">
      account_circle
      </span>
      Profile
   </a>
   <a href="/SlRail/ticketingofficer/logout">
          <span class="material-icons">
              logout
          </span>
          Logout
</a>
       

</div>

</body>