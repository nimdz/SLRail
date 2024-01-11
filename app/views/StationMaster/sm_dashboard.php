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
    <link rel="stylesheet" href="/SlRail/public/css/dashboard.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <!--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!--<style>
        /* Add your styles here */

        .train-icon {
            position: absolute;
            font-size: 15px;
            height: 30px;
            width: 30px;
            color: #000000;
            top: 50%;
            transform: translateY(-50%);
            animation: moveTrain 5s linear infinite;
            top: 277px; /* Adjust the top position as needed */
            right: 500px;
        }

        

    @keyframes moveTrain {
        0% { transform: translateX(0); }
        100% { transform: translateX(100%); }
    }
    </style>-->
</head>
<body>
    
    <?php include('public/includes/header.php'); ?>

    <?php include('sm_sidebar.php'); ?>

   
   <section style="margin-top: 20px;">
        <div class="container">
            
            <div class="tit" style="margin-left: 20px;">
                <div class="col-25">
                    <label for="uname">Train Number</label>
                </div>
                <div class="tit_holder">
                    <input type="text" id="uname" name="username" placeholder="" value="">
                </div>
                <div class="searchBtn">
                    <input type="submit" value="Search" class="update-btn" id="updatePro">
                </div>
            </div>
            <div class="card-container">
                <div class="card">
                    <h1>700</h1>
                    <p>Passengers</p>
                </div>
                <div class="card">
                    
                    <h1>Express</h1>
                    <!--<img src="/SlRail/public/assets/trainIcon.png" alt="Train Icon" class="train-icon">-->
                    <p>Type</p>
                </div>
                
            </div>
            <div class="card-container">
                <div class="card">
                    <h1>Matara</h1>
                    <p>Source</p>
                </div>
                <div class="card">
                    <h1>Colombo</h1>
                    <p>Destination</p>
                </div>
            </div>
        </div>
    </section>

  <?php include('public/includes/footer.php'); ?>
    
</body>
</html>