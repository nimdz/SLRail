<?php
// Set the active link based on the current page
$activeLink = 'updateLocation'; // Change this value according to the current page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update train location</title>
    <link rel="stylesheet" href="/SlRail/public/css/StationMaster/update_location.css">
    
    
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    
</head>
<body>
    
    <?php include('public/includes/header.php'); ?>

    <?php include('sm_sidebar.php'); ?>

   
   <section style="margin-top: 20px;">
        <div class="container">
        <h1>Update Location</h1> 
        <form action="/SlRail/trainlocation/sm_update" method="post" id="updateForm"> 
            <div class="tit" style="margin-left: 20px;">
                <div class="col-25">
                    <label for="uname">Train Number</label>
                </div>
                <div class="tit_holder">
                    <input type="text" id="uname" name="train_number" placeholder="" value="">
                </div>
                <div class="col-25">
                    <label for="update_time">Time</label>
                </div>
                <div class="tit_holder">
                    <input type="time" id="update_time" name="update_time" placeholder="" value="">
                </div>
                <div class="updateBtn">
                    <input type="submit" value="Update" class="update-btn" id="updatePro">
                </div>
            </div>
            </form>
        </div>
    </section>

  <?php include('public/includes/footer.php'); ?>
 
</body>
</html>