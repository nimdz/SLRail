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
            margin-left: 250px;
        }

        th, td {
            padding: 15px;
        }

        p {
            font-size: 32px;
        }

        h1 {
            font-size: 42px;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 50px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button + button {
            margin-top: 10px;
        }
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
<?php include('includes/header.php'); ?>

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
                    <td>
                        <button onclick="updateSchedule(<?= $schedule['schedule_id'] ?>)">Update</button>
                        <button onclick="deleteSchedule(<?= $schedule['schedule_id'] ?>)">Delete</button>
                    </td>
                </tr>

                <!-- Update Schedule Form -->
                <tr id="updateForm<?= $schedule['schedule_id'] ?>" style="display: none;">
                    <td colspan="6">
                        <form method="post" action="/SlRail/trainschedule/updateSchedule">
                            <input type="hidden" name="schedule_id" value="<?= $schedule['schedule_id'] ?>">
                            <input type="text" name="departure_station" placeholder="New Departure Station">
                            <input type="text" name="destination_station" placeholder="New Destination Station">
                            <input type="time" name="departure_time" placeholder="New Departure Time">
                            <input type="time" name="arrival_time" placeholder="New Arrival Time">
                            <input type="date" name="schedule_date" placeholder="New Schedule Date">
                            <button type="submit">Save</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p style="text-align: center; padding-top: 100px; font-size:16px;">
        <a href="/SlRail/stationmaster/dashboard">Go to StationMaster Dashboard</a>
    </p>
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
       <?php include('includes/footer.php'); ?>

</body>
</html>
