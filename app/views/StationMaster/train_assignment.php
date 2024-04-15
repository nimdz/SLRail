<?php
// Set the active link based on the current page
$activeLink = 'addSchedule'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SlRail/public/css/StationMaster/scheduleform.css">
    <!--<link rel="stylesheet" href="/SlRail/public/css/StationMaster/sidebar.css">-->

    <title>Train Assignment</title>
 
</head>
<body>


<?php include('public/includes/header.php'); ?>

<?php include('sm_sidebar.php'); ?>

    <div class="container1">
    <h2>Assign the trains</h2>
        <form action="/SlRail/train/assignTrain" method="post">
           

            <label for="trainNumber">Train Number:</label>
            <input type="number" name="trainNumber" id="trainNumber" required><br><br>

            <label for="scheduleNumber">Schedule Id:</label>
            <input type="number" name="scheduleNumber" id="scheduleNumber" required><br><br>

            <center><button type="submit">Assign the Train</button></center>   
        </form>
    </div>

<?php include('public/includes/footer.php'); ?>

</body>
</html>
