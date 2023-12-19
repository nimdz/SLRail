<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Train Schedules</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <style>
        .scheduling-table{
            width: 80%;
            margin: 20px auto; /* Center the table */
            margin-left: 300px; /* Add left margin to the table */
            border-collapse: collapse;
            }

    </style>
</head>
<body>
<?php include('public/includes/header.php'); ?>

    <?php include('passenger_sidebar.php'); ?>

    <h1><center> Train Schedule</center></h1>
    <table class="scheduling-table">
        <thead>
            <tr>
                <th>Departure Station</th>
                <th>Destination Station</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
                <th>Schedule Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedules as $schedule): ?>
                <tr>
                    <td><?= $schedule['departure_station'] ?></td>
                    <td><?= $schedule['destination_station'] ?></td>
                    <td><?= $schedule['departure_time'] ?></td>
                    <td><?= $schedule['arrival_time'] ?></td>
                    <td><?= $schedule['schedule_date'] ?></td>
                    
                </tr>

               
            <?php endforeach; ?>
        </tbody>
    </table>
    <p style="text-align: center; padding-top: 100px;">
        <a href="/SlRail/passenger/dashboard" style="font-size=16px;">Go to  Dashboard</a>
    </p>
    
    <?php include('public/includes/footer.php'); ?>


</body>
</html>