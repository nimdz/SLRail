<?php
// Set the active link based on the current page
$activeLink = 'addTrains'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add Trains</title>
    <link rel="stylesheet" href="/SlRail/public/css/train_form.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <style>
        .container{
            margin-top: 50px;
            width:1200px;
            height:auto;
        }
    </style>
</head>
<body>

<!-- header -->
<?php include('public/includes/header.php'); ?>

<?php include('sm_sidebar.php'); ?>


<div class="container">
    <form action="/SlRail/announcement/addAnnouncement" method="post">
        <h3>Add Trains</h3>

        <div class="row-trains">
            <div class="col-25">
                <label for="trainNum">Train Number:</label>
            </div>
            <div class="col-75">
                <input type="int" id="trainNum" name="trainNum" required placeholder="">
            </div>
            
            <div class="col-25">
                <label for="passengerNum">Number of Passengers:</label>
            </div>
            <div class="col-75">
                <input type="int" id="passNum" name="passNum" required placeholder="">
            </div>
        </div>

        <div class="row-trains">
        <div class="col-25">
                <label for="type">Train Type(Express/Intercity/Slow):</label>
            </div>
            <div class="col-75">
                <input type="text" id="type" name="type" required placeholder="">
            </div>
            
        </div>

        <div class="row">
        <div class="col-50"> <!-- Adjusted column width for the buttons -->
                <input type="submit" value="Send" class="update-btn" id="updatePro">
            </div>
            <div class="col-50">
                <button type="button" value="Cancel" class="cancel-btn" id="cancel-btn"><a href="/SlRail/announcement/smviewAnnouncement">Cancel</a></button>
            </div>
            
        </div>
    </form>
</div>


    <!-- footer -->
    <?php include('public/includes/footer.php'); ?>

    
</body>
</html>