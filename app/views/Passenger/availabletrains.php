<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Trains</title>
    <!-- Add any additional styles or scripts if needed -->
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .schedule-container {
            margin-left: 250px;
            font-family: Arial, sans-serif;
        }

        .schedule-card {
            display: flex;
            flex-direction: column;
            border: 1px solid #ccc;
            border-radius: 40px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }

        .schedule-card>div {
            margin-bottom: 10px;
        }

        .material-symbols-outlined {
            margin-right: 5px;
        }

        .btn1 {
            width: 400px;
            height: 200px;
            border-radius: 50px;
        }
        table {
            margin-top: 30px;
            border-collapse: collapse;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: blue;
        }
    </style>

    </style>
</head>

<body class="clearfix">

    <?php include('public/includes/header.php'); ?>

    <?php include('passenger_sidebar.php'); ?>


    <h3 style="margin-left:200px; margin-top:30px; font-family:'Courier New', Courier, monospace; font-size:32px; margin-bottom:70px;"><center>Your Ticket Details</center></h3>

    <div class="schedule-container" style="margin-left:350px;">

        <div class="schedule-card">
            <div class="train_no" style="margin-left:20px;">
                <span class="departure-station" style="margin-left:300px; margin-top:0px;"><?= $_SESSION['search_data']['departure_station'] ?></span>
                <span class="arrow"> ⇨</span>
                <span class="destination-station"><?= $_SESSION['search_data']['destination_station'] ?></span>
            </div>
            <div>
                <span class="material-symbols-outlined" style="font-size: 46px; margin-left:100px;">train</span>
                <?= $_SESSION['search_data']['train_number'] ?><?= " -  " ?><?= $_SESSION['search_data']['train_type'] ?>
                <span class="destination-station" style="margin-left:400px;"><?="No of Passengers:"?><?= $_SESSION['search_data']['number_of_passengers'] ?></span>
                <i class="fa-solid fa-person-seat"></i>
            </div>

            <div class="time" style="margin-left:220px; margin-top:10px;">
                <?php
                // Display departure and arrival times
                echo date('h:i A', strtotime($_SESSION['search_data']['departureTime'])) .
                 " ---------------------------------------------------------- ";
                // Assuming you have stored arrival time somewhere in your session data
                echo date('h:i A', strtotime($_SESSION['search_data']['arrivalTime']));
                ?>
            </div>
            <div class="stations1" style="margin-left:210px;">
                <?= $_SESSION['search_data']['departure_station'] ?>
                <span class="duration" style="margin-left:100px;">
                <?php
                    // Calculate duration
                    $departureTime = strtotime($_SESSION['search_data']['departureTime']);
                    $arrivalTime = strtotime($_SESSION['search_data']['arrivalTime']);

                    $durationSeconds = $arrivalTime - $departureTime;

                    // Convert duration to hours and minutes
                    $durationHours = floor($durationSeconds / 3600);
                    $durationMinutes = floor(($durationSeconds % 3600) / 60);
                ?>

                    <?= $durationHours ?>h <?= $durationMinutes ?>m
                </span>
                <span class="destination-station" style="margin-left:180px;"><?= $_SESSION['search_data']['destination_station'] ?></span>
            </div>

            <div class="price" style="margin-left:150px; margin-top:10px;">
                <?= "Selected Class: " . $_SESSION['search_data']['seat_class'] ?>
                <?php
                // Check if price is available
                if (isset($_SESSION['search_data']['prices'])) {
                    echo "<span class='ticket' style='margin-left:400px;'>Ticket Price: " . $_SESSION['search_data']['prices'] . "</span>";
                } else {
                    echo "<span class='ticket' style='margin-left:400px;'>Price not available</span>";
                }
                ?>
            </div>

            <form action="/SlRail/booking/add" method="post">
                <input type="hidden" name="train_number" value="<?= $_SESSION['search_data']['train_number'] ?>">
                <input type="hidden" name="train_type" value="<?= $_SESSION['search_data']['train_type'] ?>">
                <input type="hidden" name="departure_station" value="<?= $_SESSION['search_data']['departure_station'] ?>">
                <input type="hidden" name="destination_station" value="<?= $_SESSION['search_data']['destination_station'] ?>">
                <input type="hidden" name="departure_date" value="<?= $_SESSION['search_data']['departure_date'] ?>">
                <input type="hidden" name="number_of_passengers" value="<?= $_SESSION['search_data']['number_of_passengers'] ?>">
                <input type="hidden" name="seat_class" value="<?= $_SESSION['search_data']['seat_class'] ?>">
                <input type="hidden" name="ticket_price" value="<?= $_SESSION['search_data']['prices'] ?>">
                <input type="hidden" name="departureTime" value="<?= $_SESSION['search_data']['departureTime'] ?>">
                <input type="hidden" name="arrivalTime" value="<?= $_SESSION['search_data']['arrivalTime'] ?>">
                <button type="submit" clss="btn1" style="width:150px; height:40px; border-radius: 50px; margin-left:350px;">Book Now</button>
            </form>
        </div>
        <!-- Ticket Prices Table -->
        <table>
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Price per Person</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1st Class</td>
                    <td>100 Rupees per 4 stations</td>
                </tr>
                <tr>
                    <td>2nd Class</td>
                    <td>50 Rupees per 4 stations</td>
                </tr>
                <tr>
                    <td>3rd Class</td>
                    <td>20 Rupees per 4 stations</td>
                </tr>
            </tbody>
        </table>
        <!-- End of Ticket Prices Table -->

    </div>
    <?php include('public/includes/footer.php'); ?>

</body>
</html>

