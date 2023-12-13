<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Dashboard</title>
    <link rel="stylesheet" type="text/css" href="/SlRail/public/css/sidebar.css">
    <link rel="stylesheet" href="/SlRail/public/css/dashboard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="sidebar">

            <a href="#"><img width="100px" src="/SlRail/public/assets/logo.jpg"> </a>
      
            <a href="/SlRail/passenger/dashboard">
                 <span class="material-symbols-outlined">
                   dashboard
                </span>
                    Dashboard
                
            </a>  
      
            <a href="/SlRail/booking/userBookings">
                 <span class="material-symbols-outlined">
                   bookmark
                </span>
                    My Trips
                
            </a>     
            
    
           <a href="/SlRail/trainschedule/showSchedule">
                <span class="material-symbols-outlined">
                  calendar_month
                </span>
                Train Schedule
            </a>
            <a href="/SlRail/booking/add">
                <span class="material-symbols-outlined">
                    book_online
                    </span>
                Book a Trip
            </a>
            <a href="/SlRail/passenger/viewLocation">
                <span class="material-symbols-outlined">
                    location_on
                </span>
                Track Location
            </a>
            <a href="/SlRail/review/add">
                <span class="material-symbols-outlined">
                    reviews
                </span>
                Feedback
            </a>
            <a href="/SlRail/announcement/viewAnnouncement">
                 <span class="material-symbols-outlined">
                  campaign
                </span>
                Announcement              
            </a> 
        <a href="/SlRail/passenger/profile">
            <span class="material-icons">
            account_circle
            </span>
            Profile
         </a>
         <a href="/SlRail/passenger/logout">
                <span class="material-icons">
                    logout
                </span>
                Logout
           <a>
             
      
    </div>
  
  <div class="topnav-search">

     <i class="material-icons">search</i>
     <input type="text" placeholder="Search..." style="margin-left:50px;">
     <!-- Container for profile image and notification icon -->
     <div style="display: flex; align-items: center; margin-left: 450px; margin-top:20px;">
        <span class="material-symbols-outlined" style="margin-top: 10px; font-size:32px;">
            notifications
        </span>
        <img src="/SlRail/public/assets/profile.jpg" style="width:50px; border-radius: 50px; margin-right: 10px;">
    </div>
    <p style="display:inline; margin-left:20px; margin-top: 30px;">Welcome <?= $_SESSION['username'] ?></p>
</div>


    <div class="content">
      <h1 > <center>Welcome Passenger! </center></Welcome></h1>
      <p>"Welcome to the Passenger Hub, 
          your central destination for a seamless railway experience. 
          As a passenger, you are at the heart of our SL railway system, 
          and this hub is designed to enhance your journey. From this platform, 
          you have the tools to manage your passenger profile,
          access real-time information about your travel, and provide feedback or
         make inquiries. Stay up to date with train schedules, track live train locations, and receive updates on arrivals and departures.
         Whether you're planning your trip, seeking assistance, or sharing your thoughts, this comprehensive set of features empowers you to have a smooth and enjoyable travel experience. Please explore the menu on the left to access these functionalities and make the most of your railway journey. 
         We are dedicated to making your railway experience as convenient and enjoyable as possible"
      </p>
    </div>
<?php include('public/includes/footer.php'); ?>

    
</body>
</html>