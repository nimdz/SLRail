<?php
// Set the active link based on the current page
$activeLink = 'allSchedules'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Train Schedules</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    
    <style>
        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
            margin-left: 300px;
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
<?php include('public/includes/header.php'); ?>

<?php include('to_sidebar.php'); ?>


    <h1><center>All Train Schedules</center></h1>
    <table>
        <thead>
            <tr>
                <th>Departure Station</th>
                <th>Destination Station</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
                
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedules as $schedule): ?>
                <tr>
                    <td><?= $schedule['departure_station'] ?></td>
                    <td><?= $schedule['destination_station'] ?></td>
                    <td><?= $schedule['departure_time'] ?></td>
                    <td><?= $schedule['arrival_time'] ?></td>
                    
               
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   
 
    <?php include('public/includes/footer.php'); ?>

</body>
</html>