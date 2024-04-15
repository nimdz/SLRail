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
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .schedule-container {
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .update-btn, .delete-btn {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .update-btn {
            background-color: #007bff;
            color: #fff;
        }

        .delete-btn {
            background-color: #dc3545;
            color: #fff;
        }

        .update-btn:hover, .delete-btn:hover {
            background-color: #0056b3;
        }

        .action-buttons {
            display: inline;
        }
    </style>
</head>
<body>
<?php include('public/includes/header.php'); ?>
<?php include('ad_sidebar.php'); ?>

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
                <th>Actions</th>
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
                    <td>
                        <div class="action-buttons">
                            <a href="/SlRail/trainschedule/loadupdateForm?schedule_id=<?= $schedule['schedule_id'] ?>" class="update-btn">Update</a>
                            <a href="/SlRail/trainschedule/deleteSchedule?schedule_id=<?= $schedule['schedule_id'] ?>" class="delete-btn">Delete</a>
                        </div>
                    </td>
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
