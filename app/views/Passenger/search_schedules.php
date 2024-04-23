<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Train Schedules</title>
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link rel="stylesheet" href="/SlRail/public/css/Passenger/searchform.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
</head>
<body>

<?php include('public/includes/header.php'); ?>
<?php include('passenger_sidebar.php'); ?>

<form action="/SlRail/trainschedule/filter" method="get">

    <h1>Live Train Schedules</h1>

    <div class="form-row">
        <label for="startStation">Start Station:</label>
        <select id="From" name="departure_station" required>
            <option value="">Choose Station</option>
            <?php foreach ($data['stations'] as $station): ?>
                <option value="<?php echo $station['station_name']; ?>"><?php echo $station['station_name']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="endStation">End Station:</label>
        <select id="destination" name="destination_station" required>
            <option value="">Choose Station</option>
            <?php foreach ($data['stations'] as $station): ?>
                <option value="<?php echo $station['station_name']; ?>"><?php echo $station['station_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-row">
        <label for="departure_date">Date:</label> 
        <input type="date" id="date" name="departure_date" required style="margin-top: 15px; margin-right:250px;"> <!-- Adjusted margin-top -->
    </div>

    <button type="submit" class="btn1">Search</button>
</form>

<?php include('public/includes/footer.php'); ?>

</body>
</html>
