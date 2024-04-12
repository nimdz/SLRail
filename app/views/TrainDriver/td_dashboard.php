<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrainDriver Dashboard</title>
    <link rel="stylesheet" href="/SlRail/public/css/p_dashboard.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 250px;
            margin-top: 100px;
            background-color: #f9f9f9bb;
        }

        .image-box {
            text-align: center;
        }

        /* Optional: Adjust the styling as per your design requirements */
        img {
            max-width: 100%;
            height: auto;
        }

        .btn1 {
            margin-left: 80px;
            margin-top: 40px;
            border-radius: 40px;
            background-color: blue;
            width: 210px;
            height: 55px;
            color: white;
            font-size: 16px;
        }

        /* Style for icons */
        .material-icons-big {
            font-size: 40px;
            color: blue;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<?php include('td_sidebar.php'); ?>

<!-- Top Navigation Bar -->
<div class="topnav-search">
    <i class="material-icons">search</i>
    <input type="text" placeholder="  Search Trains." style="margin-left:50px;">
    <!-- Container for profile image and notification icon -->
    <div style="display: flex; align-items: center; margin-left: 450px; margin-top:20px;">
        <span class="material-symbols-outlined" style="margin-top: 10px; font-size:32px;">
            notifications
        </span>
        <img src="/SlRail/public/assets/profile.jpg" style="width:50px; border-radius: 50px; margin-right: 10px;">
    </div>
    <p style="display:inline; margin-left:20px; margin-top: 30px;">Welcome <?= $_SESSION['username'] ?></p>
</div>
<!-- Services Section -->

<!-- Dashboard Options -->
<div style="display: flex; align-items: center; margin-top: 20px; margin-left: 420px;">
    <!-- Trains -->
    <div style="margin-right: 20px;">
      <a href="/SlRail/train/view">
        <span class="material-symbols-outlined" style="font-size:250px; color:blue; background-color:whitesmoke;">
            train
        </span> 
      </a>
        <p style="margin-left:80px; font-weight:bold; font-family:'Courier New', Courier, monospace;">Trains</p>
    </div>
    <!-- Schedule -->
    <div style="margin-left: 100px;">
      <a href="/SlRail/trainschedule/tdviewSchedules">
        <span class="material-symbols-outlined" style="font-size:250px; color:blue; background-color:whitesmoke;">
            calendar_month
        </span> 
      </a>
        <p style="margin-left:40px; font-weight:bold; font-family:'Courier New', Courier, monospace;">Train Schedules</p>
    </div>
</div>

<!-- Share Location -->
<div style="display: flex; align-items: center; margin-top: 20px; margin-left: 420px;">
    <div style="margin-right: 20px;">
      <a href="/SlRail/trainlocation/load">
        <span class="material-symbols-outlined" style="font-size:250px; color:blue; background-color:whitesmoke;">
            share_location
        </span> 
      </a>
        <p style="margin-left:60px; font-weight:bold; font-family:'Courier New', Courier, monospace;">Share  Location</p>
    </div>
    <div style="margin-left: 100px;">
      <a href="/SlRail/announcement/tdaddAnnouncement">
        <span class="material-symbols-outlined" style="font-size:250px; color:blue; background-color:whitesmoke;">
            railway_alert
        </span> 
      </a>
        <p style="margin-left:60px; font-weight:bold; font-family:'Courier New', Courier, monospace;">Add Train Alert</p>
    </div>
</div>

<?php include('public/includes/footer.php'); ?>

</body>
</html>
