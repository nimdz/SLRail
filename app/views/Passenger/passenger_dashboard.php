<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Dashboard</title>
    <link rel="stylesheet" type="text/css" href="/SlRail/public/css/sidebar.css">
    <link rel="stylesheet" href="/SlRail/public/css/p_dashboard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
 <!-- Sidebar--> 
 <?php include('passenger_sidebar.php'); ?>

    

 <!-- Top Navigation Bar --> 
  <div class="topnav-search">
      <i class="material-icons">search</i>
     <input type="text" placeholder="  Search Train Schedules,Bookings & Live Updates of Trains... " style="margin-left:50px;">
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
    <h1 style="margin-left:300px;">Popular Destinations</h1>

    <figure>
        <img src="/SlRail/public/assets/Colombo.jpg" alt="Colombo">
        <figcaption>Colombo</figcaption>
    </figure>

    <figure>
        <img src="/SlRail/public/assets/Galle.jpg" alt="Galle">
        <figcaption>Galle</figcaption>
    </figure>

    <figure>
        <img src="/SlRail/public/assets/Kandy.jpg" alt="Kandy">
        <figcaption>Kandy</figcaption>
    </figure>

    <figure>
        <img src="/SlRail/public/assets/Nuwaraeliya.jpg" alt="Nuwara Eliya">
        <figcaption>Nuwara Eliya</figcaption>
    </figure>

    <figure>
        <img src="/SlRail/public/assets/sigiriya.jpg" alt="Sigiriya">
        <figcaption>Sigiriya</figcaption>
    </figure>

    <a href="/SlRail/booking/add">   
    <button class="btn">Reserve Your Seat Now</button>
    </a>
</div>

 <!-- Services Section --> 

<div class="services">
    <h1 style="margin-left:200px">Our Services</h2>
    <div class="services-container">
        <img style="margin-left:20px;"src="/SlRail/public/assets/services.jpg">
        <div class="button-container">
           <a href="/SlRail/trainschedule/showSchedule">
              <button class="btn">Check Train Schedule</button>
           </a>
           <a href="/SlRail/passenger/viewLocation">
              <button class="btn">Check Train  Location</button>
           </a>
        </div>
    </div>
</div>


/** Footer */ 
<?php include('public/includes/footer.php'); ?>

    
</body>
</html>