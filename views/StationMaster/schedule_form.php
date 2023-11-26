<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SlRail/public/css/form.css">
    <title>Add Train Schedule</title>
 
</head>
<body>
    
<?php include('includes/header.php'); ?>

    <div class="container1">
    <h2>Add Train Schedule</h2>
        <form action="/SlRail/trainschedule/addSchedule" method="post">
            <label for="departure_station">Departure Station:</label>
            <input type="text" name="departure_station" id="departure_station" required><br><br>

            <label for="destination_station">Destination Station:</label>
            <input type="text" name="destination_station" id="destination_station" required><br><br>

            <label for="departure_time">Departure Time:</label>
            <input type="time" name="departure_time" id="departure_time" required><br><br>

            <label for="arrival_time">Arrival Time:</label>
            <input type="time" name="arrival_time" id="arrival_time" required><br><br>

            <label for="schedule_date">Schedule Date:</label>
            <input type="date" name="schedule_date" id="schedule_date" required><br><br>

            <button type="submit">Add Schedule</button>    
        </form>
    </div>

    <?php include('includes/footer.php'); ?>

</body>
</html>
