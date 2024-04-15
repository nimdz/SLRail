<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SlRail/public/css/StationMaster/scheduleform.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">

    <!--<link rel="stylesheet" href="/SlRail/public/css/StationMaster/sidebar.css">-->

    <title>Add Train Schedule</title>
    <style>
      .container1{
       margin-left: 250px;
       width:1000px;
    }
    /* Add this style to limit the height of the stopping list and enable scrolling */
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

<h2 style="margin-left:200px; font-family:'Courier New', Courier, monospace;font-weight:bold;">Update Train Schedule</h2>


    <div class="container1">
        <form action="/SlRail/trainschedule/updateSchedule" method="post">
            <label for="departure_station">Departure Station:</label>
            <!--<input type="text" name="departure_station" id="departure_station" required><br><br>-->
            <select id="From" name="departure_station" required>
            </select> 

            <label for="destination_station">Destination Station:</label>
            <!--<input type="text" name="destination_station" id="destination_station" required><br><br>-->
            <select id="destination" name="destination_station" required>
            </select> 

            <input type="hidden" name="schedule_id" value="<?= $scheduleId ?>">

            <label for="departure_time">Departure Time:</label>
            <input type="time" name="departure_time" id="departure_time" required><br><br>

            <label for="arrival_time">Arrival Time:</label>
            <input type="time" name="arrival_time" id="arrival_time" required><br><br>

            <label for="train_number">Train Number:</label>
            <input type="number" name="train_number" id="train_number" required><br><br>

            <label for="train_type">Train Type:</label>
            <select id="train_type" name="train_type" required>
            <option value="" disabled selected>Select Train Type</option>
                <option value="Express">Express</option>
                <option value="Intercity">Intercity</option>
                <option value="Slow">Slow</option>
            </select>
            <br><br>


            <!--<label for="stoppings">Stoppings:</label>
            <input type="text" name="stoppings" id="stoppings" required><br><br>-->
           <label for="stoppings">Stoppings:  <div class="statement">(Use Ctrl to select multiple options)</div></label>
           
            <select id="stoppings" name="stoppings[]" multiple required>
            </select>

            <label>Available Days:</label><br>
            <label class="checkbox-label">Monday
            <input type="checkbox" name="monday" value="1"> 
            <span class="checkmark"></span>
            </label>
            <label class="checkbox-label">
            <input type="checkbox" name="tuesday" value="1"> Tuesday<br>
            <span class="checkmark"></span>
            </label>
            <label class="checkbox-label">
            <input type="checkbox" name="wednesday" value="1"> Wednesday<br>
            <span class="checkmark"></span>
            </label>
            <label class="checkbox-label">
            <input type="checkbox" name="thursday" value="1"> Thursday<br>
            <span class="checkmark"></span>
            </label>
            <label class="checkbox-label">
            <input type="checkbox" name="friday" value="1"> Friday<br>
            <span class="checkmark"></span>
            </label>
            <label class="checkbox-label">
            <input type="checkbox" name="saturday" value="1"> Saturday<br>
            <span class="checkmark"></span>
            </label>
            <label class="checkbox-label">
            <input type="checkbox" name="sunday" value="1"> Sunday<br>
            <span class="checkmark"></span>
            </label>

            <label for="route">Train Route:</label>
            <select id="route" name="route" required>
            <option value="" disabled selected>Select Train Route</option>
                <option value="coast_line">coast_line</option>
                <option value="main_line">main_line</option>
                <option value="matale_line">matale_line</option>
                <option value="eastern_line">eastern_line</option>

            </select>
            <br><br>

            <center><button type="submit" style="margin-bottom:80px; border-radius:50px;">Update Schedule</button></center>   
        </form>
        <!-- Include the stations.js script only once -->
        <script src="/SlRail/public/Js/stations.js" type="text/javascript"></script>
    </div>

<?php include('public/includes/footer.php'); ?>

</body>
</html>
