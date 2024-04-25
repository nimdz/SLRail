<?php
// Set the active link based on the current page
$activeLink = 'dashboard'; // Change this value according to the current page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StationMaster Dashboard</title>
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
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            display: inline-block;
            width: 350px; /* Adjust width as needed */
            height: 180px; /* Adjust height as needed */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            transition: transform 0.3s ease;
        }

        /* Alternate background color for cards */
        .card:nth-child(even) {
            background-color: #f0f0f0;
        }

        /* Title styling */
        .card h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }
        .center {
            text-align: center;
        }

        /* Header styling */
        h1 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Hover effect */
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

<?php include('sm_sidebar.php'); ?>

<?php include('public/includes/header.php'); ?>

<div class="content center" style="margin-top: 50px;">
    <div style="display: flex; justify-content: center;">
         
        
        <a href="/SlRail/traindelay/loadForm?user_id=<?= $_SESSION['user_id'] ?>" class="card">
    <h2>Update Train Status</h2>
    <span class="material-symbols-outlined" style="font-size:32px;">train</span>
</a>

        <a href="/SlRail/trainlocation/load" class="card">
            <h2>Share Location</h2>
            <span class="material-symbols-outlined" style="font-size:32px; ">share_location</span>
        </a>
    </div>
    <div style="text-align: center; margin-top: 20px;">
        <a href="/SlRail/announcement/addAnnouncement" class="card">
            <h2>Add Train Alert</h2>
            <span class="material-symbols-outlined" style="font-size:32px; ">railway_alert</span>
        </a>
    </div>
</div>

<?php include('public/includes/footer.php'); ?>

</body>
</html>
