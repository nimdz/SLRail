<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SlRail/public/css/form.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">

    <title>Add Train Schedule</title>
  
 
</head>
<body>


<?php include('includes/header.php'); ?>

<?php include('sm_sidebar.php'); ?>



    <div class="container1">
    <h2>Add Train Schedule</h2>
        <form action="/SlRail/trainschedule/addSchedule" method="post">
            <label for="departure_station">Departure Station:</label>
            <input type="text" name="departure_station" id="departure_station" required><br><br>

            <label for="destination_station">Destination Station:</label>
            <input type="text" name="destination_station" id="destination_station" required><br><br>

            <label for="departure_time">Departure Time:</label>
            <input type="time" name="departure_time" id="departure_time" pattern="[0-9]{2}:[0-9]{2} (AM|PM)"required><br><br>

            <label for="arrival_time">Arrival Time:</label>
            <input type="time" name="arrival_time" id="arrival_time" pattern="[0-9]{2}:[0-9]{2} (AM|PM)"required><br><br>

            <label for="schedule_date">Schedule Date:</label>
            <input type="date" name="schedule_date" id="schedule_date" required><br><br>
            
            <label for="train_number">Train Number: </label>
            <input type="number" name="train_number" id="train_number" required><br><br>

            <label for="train_type">Train Type:</label>
            <input type="text" name="train_type" id="train_type" required><br><br>

            <button type="submit">Add Schedule</button>    
        </form>
    </div>


</body>
</html>
