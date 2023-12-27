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
    <style>
        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 1100px;
            margin-left: 300px;
        }

        th, td {
            padding: 15px;
        }

        p {
            font-size: 32px;
        }

        h1 {
            font-size: 42px;
            margin-left: 300px;
            margin-top: 50px;
        }

        /*button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 50px;   

            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button .update{
            background-color: #93c1f5;
        }
        button .delete{
            background-color: #007bff;
        }

        button + button {
            margin-top: 10px;
        }*/
    .subfooter {
        margin-left: 0px;
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 70px;
        background-color: #f9f9f9bb;
    }

    .subfooter-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        align-items: center;
        padding: 20px; 
        background-color: #f9f9f9bb;

    }
    </style>
</head>
<body>
<?php include('public/includes/header.php'); ?>

<?php include('sm_sidebar.php'); ?>


    <h1><center>All Train Schedules</center></h1>
    <table>
    <thead>
        <tr>
            <th>Departure Station</th>
            <th>Destination Station</th>
            <th>Departure Time</th>
            <th>Arrival Time</th>
            <th>Schedule Date</th>
            <th>Train Number</th>
            <th>Train Type</th>
            <th>Actions</th>
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
                <td><?= $schedule['train_number'] ?></td>
                <td><?= $schedule['train_type'] ?></td>
                <td>
                    <!-- Add a condition to hide buttons when update form is visible -->
                    <?php if (!isset($_POST['schedule_id']) || $_POST['schedule_id'] !== $schedule['schedule_id']): ?>
                        <button class="update" onclick="updateSchedule(<?= $schedule['schedule_id'] ?>)">Update</button>
                        <button class="delete" onclick="deleteSchedule(<?= $schedule['schedule_id'] ?>)">Delete</button>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Update Schedule Forms -->
<?php foreach ($schedules as $schedule): ?>
    <div id="updateForm<?= $schedule['schedule_id'] ?>" style="display: none; width: calc(100% - 250px); padding-left: 300px;">
        <form method="post" action="/SlRail/trainschedule/updateSchedule" style="width: 100%;">
            <input type="hidden" name="schedule_id" value="<?= $schedule['schedule_id'] ?>">
            <div style="display: flex; justify-content: space-between; width: 100%;">
                <input type="text" name="departure_station" placeholder="New Departure Station" style="flex: 1; margin-right: 20px;">
                <input type="text" name="destination_station" placeholder="New Destination Station" style="flex: 1; margin-right: 20px;">
                <input type="time" name="departure_time" placeholder="New Departure Time" style="flex: 1; margin-right: 20px;">
                <input type="time" name="arrival_time" placeholder="New Arrival Time" style="flex: 1; margin-right: 20px;">
                <input type="date" name="schedule_date" placeholder="New Schedule Date" style="flex: 1;margin-right: 20px;">
                <input type="number" name="train_number" placeholder="New Train Number" style="flex: 1;margin-right: 20px;">
                <input type="text" name="train_type" placeholder="New Train Type" style="flex: 1;margin-right: 20px;">
            </div>
            <button type="submit" style="width: auto;">Save</button>
        </form>
    </div>
<?php endforeach; ?>

    <script>
    // JavaScript function to toggle visibility of update forms
    function updateSchedule(scheduleId) {
        var form = document.getElementById("updateForm" + scheduleId);
        if (form.style.display === "none") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }
    function deleteSchedule(scheduleId) {
        if (confirm("Are you sure you want to delete this schedule?")) {
            // Redirect to the delete URL (you need to define this in your router)
            window.location.href = "/SlRail/trainschedule/deleteSchedule?schedule_id=" + scheduleId;
        }
    }
</script>
    
       <?php include('public/includes/footer.php'); ?>

</body>
</html>
