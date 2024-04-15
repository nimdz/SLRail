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
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">

    <!--<link rel="stylesheet" href="/SlRail/public/css/StationMaster/sidebar.css">-->

    <title>View Station Details</title>
    <style>
      .container1{
       margin-left: 250px;
       width:1000px;
    }
    #stoppings {
    height: 150px; /* Adjust the height as needed */
    overflow-y: auto; /* Enable vertical scrolling */
}

    /* Adjust the checkbox label style to make them smaller */
    .checkbox-label {
        font-size: 14px; /* Reduce the font size */
    }
    </style>
 
</head>
<body>


<?php include('public/includes/header.php'); ?>

<?php include('ad_sidebar.php'); ?>

<h2 style="margin-left:200px; font-family:'Courier New', Courier, monospace;font-weight:bold;">View Stations</h2>


    <div class="container1">

       <form action="/SlRail/station/fetchStations" method="POST">
         
            <label for="lineId">Select Line:</label>
            <select id="lineId" name="lineId" required>
            <option value="" disabled selected>Select line No</option>
                <option value="1">Coast Line</option>
                <option value="2">Main Line</option>
                <option value="3">Matale Line</option>
            </select>
            <br><br>

            <center><button type="submit" style="margin-bottom:80px; border-radius:50px;">Search Stations</button></center>   
        </form>
    </div>

<?php include('public/includes/footer.php'); ?>

</body>
</html>