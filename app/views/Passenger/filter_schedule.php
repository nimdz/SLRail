<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train schedule</title>
    <!-- Add any additional styles or scripts if needed -->
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="clearfix">

    <?php include('public/includes/header.php'); ?>

    <?php include('passenger_sidebar.php'); ?>

    <h1 style="margin-left:270px; margin-top:10px;"><center>Train Schedule</center></h1>

    <?php if (isset($availableTrains) && !empty($availableTrains)) : ?>
        <table class="trains-table" style="margin-top:5px; margin-left:220px;">
            <thead>
                <tr>
                    <th><span class="material-symbols-outlined">train</span> Train ID</th>
                    <th><span class="material-symbols-outlined">train</span> Train Type</th>
                    <th><span class="material-symbols-outlined">location_on</span> Departure Station</th>
                    <th><span class="material-symbols-outlined">location_on</span> Destination Station</th>
                    <th><span class="material-symbols-outlined">schedule</span> Departure Time</th>
                    <th><span class="material-symbols-outlined">schedule</span> Arrival Time</th>
                    <th><span class="material-symbols-outlined">event</span> Availability</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($availabletrains as $train) : ?>
                    <tr>
                        <td><?= $train['train_number'] ?></td>
                        <td><?= $train['train_type'] ?></td>
                        <td><?= $train['departure_station'] ?></td>
                        <td><?= $train['destination_station'] ?></td>
                        <td><?= date('h:i', strtotime($train['departure_time'])) ?>
                        <?= date('A', strtotime($train['departure_time'])) ?></td>
                        <td><?= date('h:i', strtotime($train['arrival_time'])) ?>
                        <?= date('A', strtotime($train['arrival_time'])) ?></td>
                        <td><?= getAvailabilityStatus($train) ?></td>
                <?php endforeach; ?>
            </tbody>
        </table>


    <?php else : ?>
        <p style="margin-left:250px; border:1px solid white; height:20px;"> No available trains found. Please try again.</p>
    <?php endif; ?>


<?php include('public/includes/footer.php'); ?>

<p style="text-align: center; padding-top: 100px;">
        <a href="/SlRail/passenger/dashboard" style="font-size:16px;">Go to  Dashboard</a>
    </p>


</body>

</html>

<?php
function getAvailabilityStatus($train)
{
    $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

    $runningDays = [];
    foreach ($days as $day) {
        if ($train[$day] == 1) {
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
