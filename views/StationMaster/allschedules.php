<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Train Schedules</title>
    <style>
        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
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
    </style>
</head>
<body>
    <h1><center>All Train Schedules</center></h1>
    <table>
        <thead>
            <tr>
                <th>Schedule Id</th>
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
                    <td><?= $schedule['schedule_id'] ?></td>
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
                        <form method="post" action="/SlRail/schedule/update">
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
    <p style="text-align: center; padding-top: 100px;">
        <a href="/SlRail/employee/dashboard">Go to Employee Dashboard</a>
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
                window.location.href = "/SlRail/schedule/delete?schedule_id=" + scheduleId;
            }
        }
    </script>
</body>
</html>
