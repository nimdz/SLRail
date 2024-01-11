<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Train Schedules</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <style>
            th{
              width:2050px;
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
                <th><span class="material-symbols-outlined">train</span> Train ID</th>
                <th><span class="material-symbols-outlined">train</span> Train Type</th>
                <th><span class="material-symbols-outlined">location_on</span> Departure Station</th>
                <th><span class="material-symbols-outlined">location_on</span> Destination Station</th>
                <th><span class="material-symbols-outlined">access_time</span> Departure Time</th>
                <th><span class="material-symbols-outlined">schedule</span> Arrival Time</th>
                <th><span class="material-symbols-outlined">event</span> Availability</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedules as $schedule): ?>
                <tr>
                   <td><?= $schedule['train_number'] ?></td>
                   <td><?= $schedule['train_type'] ?></td>
                    <td><?= $schedule['departure_station'] ?></td>
                    <td><?= $schedule['destination_station'] ?></td>
                    <td><?= date('h:i', strtotime($schedule['departure_time'])) ?>
                       <?= date('A', strtotime($schedule['departure_time'])) ?></td>
                    <td><?= date('h:i', strtotime($schedule['arrival_time'])) ?>
                       <?= date('A', strtotime($schedule['arrival_time'])) ?></td>
                    <td><?= getAvailabilityStatus($schedule) ?></td>
                    
                </tr>

               
            <?php endforeach; ?>
        </tbody>
    </table>
    <p style="text-align: center; padding-top: 100px;">
        <a href="/SlRail/passenger/dashboard" style="font-size:16px;">Go to  Dashboard</a>
    </p>
    
    <?php include('public/includes/footer.php'); ?>


</body>
</html>
<?php
function getAvailabilityStatus($schedule)
{
    $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

    $runningDays = [];
    foreach ($days as $day) {
        if ($schedule[$day] == 1) {
            $runningDays[] = ucfirst($day);
        }
    }

    if (count($runningDays) === 7) {
        return 'Daily';
    } else {
        return implode(', ', $runningDays);
    }
}
?>