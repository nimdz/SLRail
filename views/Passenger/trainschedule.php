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
    <div class="container" style="background-color: brown; text-align: center; padding:0px;">
        <p style="color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
            <span style="font-weight: bold;">SL Rail - </span>
            <span style="font-style: normal;">Revolutionizing Sri Lankan Rail Travel</span>
        </p>
    </div>
    <h1><center> Train Schedule</center></h1>
    <table>
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
        <a href="/SlRail/passenger/dashboard" style="font-size: 24px;">Go to  Dashboard</a>
    </p>
    <div class="subfooter">
        <div class="subfooter-container">
            <h5>&copy; 2023 SL Rail. All rights reserved.</h5>
        </div>
    </div>

</body>
</html>