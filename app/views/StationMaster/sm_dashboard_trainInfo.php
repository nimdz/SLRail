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
    <link rel="stylesheet" href="/SlRail/public/css/StationMaster/dashboard.css">
    <link rel="stylesheet" href="/SlRail/public/css/StationMaster/sidebar.css">
    
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
</head>
<body>
    
    <?php include('public/includes/header.php'); ?>

    <?php include('sm_sidebar.php'); ?>

   
   <section style="margin-top: 20px;">
        <div class="container">
        <form action="/SlRail/train/searchTrain" method="post" id="searchForm"> 
            <div class="tit" style="margin-left: 20px;">
                <div class="col-25">
                    <label for="uname">Train Number</label>
                </div>
                <div class="tit_holder">
                    <input type="text" id="uname" name="train_number" placeholder="" value="">
                </div>
                <div class="searchBtn">
                    <input type="submit" value="Search" class="update-btn" id="updatePro">
                </div>
            </div>
            </form>
            <!--<div class="card-container">
                <div class="card">
                    <h1>700</h1>
                    <p>Passengers</p>
                </div>
                <div class="card">
                    
                    <h1>Express</h1>-->
                    <!--<img src="/SlRail/public/assets/trainIcon.png" alt="Train Icon" class="train-icon">-->
                    <!--<p>Type</p>
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
            </div>-->
            
            <?php if ($trainInfo): ?>
            <div class="card-container">
                <div class="card" id="passengersCard">
                    <h1><?php echo $trainInfo['capacity']; ?></h1>
                    <p>Passengers</p>
                </div>
                <div class="card" id="typeCard">
                    <h1><?php echo $trainInfo['train_type']; ?></h1>
                    <p>Type</p>
                </div>
            </div>
            <div class="middle-card" id="stoppingsCard">
        <div class="stoppings-content">
            <?php
            // Assuming $trainInfo['stoppings'] is a comma-separated string
            $stoppingsArray = explode(',', $trainInfo['stoppings']);
            foreach ($stoppingsArray as $stopping): ?>
                <div class="stoppings-item">
                    <h4><?php echo $stopping; ?></h4>
                    
                </div>
            <?php endforeach; ?>
            <p>Stopping Points</p>
        </div>
    </div>
        <?php else: ?>
            <p>No information found for the given train number.</p>
        <?php endif; ?>
  
        </div>
    </section>

  <?php include('public/includes/footer.php'); ?>
 
</body>
</html>