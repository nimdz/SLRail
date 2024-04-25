<?php
// Set the active link based on the current page
$activeLink = 'trainSchedules'; // Change this value according to the current page
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Train Schedules</title>
    <link rel="stylesheet" href="/SlRail/public/css/TrainDriver/schedules.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
</head>
<body>
<?php include('public/includes/header.php'); ?>
<?php include('sm_sidebar.php'); ?>

<h2 style="margin-left:250px; margin-top:20px; margin-bottom:30px"><center> Train Schedules</center></h2>

<div class="schedule-container" style="margin-left:250px;">
    <table>
        <thead>
            <tr>
                <th>Train Number</th>
                <th>Departure Station</th>
                <th>Destination Station</th>
                <th>Train Type</th>
                <th>Availability</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedules as $schedule): ?>
                <tr>
                    <td><?= $schedule['train_number'] ?></td>
                    <td><?= $schedule['departure_station'] ?></td>
                    <td><?= $schedule['destination_station'] ?></td>
                    <td><?= $schedule['train_type'] ?></td>
                    <td><?= getAvailabilityStatus($schedule) ?></td>
                    <td><?= date('h:i A', strtotime($schedule['departure_time'])) ?></td>
                    <td><?= date('h:i A', strtotime($schedule['arrival_time'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

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
