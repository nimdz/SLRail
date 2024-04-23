<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train schedule</title>
    <!-- Add any additional styles or scripts if needed -->
    <link rel="stylesheet" href="/SlRail/public/css/Passenger/train_schedule.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<body class="clearfix">

    <?php include('public/includes/header.php'); ?>

    <h3 style="margin-left:200px; margin-top:30px; font-family:'Courier New', Courier, monospace; font-size:32px; margin-bottom:30px;"><center>Available Trains </center></h3>


    <?php include('passenger_sidebar.php'); ?>
    <script src="/SlRail/public/Js/stations.js" type="text/javascript"></script>


    <?php if (isset($availabletrains) && !empty($availabletrains)) : ?>
        <div class="schedule-container" style="margin-left:290px; ">
            <?php foreach ($availabletrains as $index => $train) : ?>
                <div class="schedule-card">
                    <div class="train_no" style="margin-left:20px;">
                        <span class="departure-station" style="margin-left:130px; margin-top:0px;"><?= $train['departure_station'] ?></span>
                        <span class="arrow"> ⇨</span>
                        <span class="destination-station"><?= $train['destination_station'] ?></span>
                    </div>
                    <div>
                        <span class="material-symbols-outlined" style="font-size: 46px; margin-left:100px;">train</span>
                        <?= $train['train_number'] ?><?= " -  " ?><?= $train['train_type'] ?>
                        <span class="destination-station" style="margin-left:400px;"><?="Availability: "?>  <?= getAvailabilityStatus($train) ?></span>


                    </div>

                    <div class="time" style="margin-left:300px; margin-top:10px;">
                        <?php
                        // Find the departure and arrival times for the searched stations
                        $departureTime = '';
                        $arrivalTime = '';
                        foreach ($train['stoppings'] as $stop) {
                            if ($stop['station_name'] === $departure_station) {
                                $departureTime = $stop['arrival_time'];
                            }
                            if ($stop['station_name'] === $destination_station) {
                                $arrivalTime = $stop['arrival_time'];
                            }
                        }
                        ?>
                        <?= date('h:i', strtotime($departureTime)) ?>
                        <?= date('A', strtotime($departureTime)) ?>
                        <?=" ●---------------------------------------------●" ?>
                        <?php
                        // Calculate duration
                        $departureTimestamp = strtotime($departureTime);
                        $arrivalTimestamp = strtotime($arrivalTime);
                        $durationSeconds = $arrivalTimestamp - $departureTimestamp;

                        // Convert duration to hours and minutes
                        $durationHours = floor($durationSeconds / 3600);
                        $durationMinutes = floor(($durationSeconds % 3600) / 60);
                        ?>
                        <?= date('h:i', strtotime($arrivalTime)) ?>
                        <?= date('A', strtotime($arrivalTime)) ?>
                    </div>
                    <div class="stations1" style=" margin-left:300px;">
                        <?= $departure_station ?>
                        <span class="duration"style="margin-left:70px;"><?=$durationHours?>h<?=$durationMinutes?>m
                            <span class="destination-station" style="margin-left:130px;"><?= $destination_station ?></span>
                    </div>
                    <div class="btn1">
                        <button type="button" class="btn" id="bookNowBtn<?= $index ?>" style="margin-left: 150px; margin-top:30px;width:500px; height:40px;background-color:red;" onclick="toggleButtons('bookNowBtn<?= $index ?>', 'passengerForm<?= $index ?>')">Book Now</button>
                        <!-- Hidden form for passenger selection -->
                        <form action="/SlRail/booking/search" method="GET" id="passengerForm<?= $index ?>" style="display: none;">
                            <!-- Hidden input fields for departure station, destination station, and date -->
                            <input type="hidden" name="departure_station" value="<?= $departure_station ?>">
                            <input type="hidden" name="destination_station" value="<?= $destination_station ?>">
                            <input type="hidden" name="departure_date" value="<?= $departure_date ?>">
                            <input type="hidden" name="train_number" id="trainNumberInput" value="<?= $train['train_number'] ?>">
                            <input type="hidden" name="train_type" id="trainNumberInput" value="<?= $train['train_type'] ?>">
                            <input type="hidden" name="departureTime" value="<?= $departureTime ?>">
                            <input type="hidden" name="arrivalTime" value="<?= $arrivalTime ?>">

                            <label for="number_of_passengers">Passengers:</label>
                            <select id="passengers" name="number_of_passengers" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <label for="number_of_passengers">Seat Class:</label>
                            <select name="seat_class" class="train-class" data-departure="<?= $train['departure_station'] ?>" data-destination="<?= $destination_station ?>">
                                <option value="Class1">Class 1</option>
                                <option value="Class2">Class 2</option>
                                <option value="Class3">Class 3</option>
                            </select>
                            <button type="submit" style="margin-left: 350px;  width:250px; height:30px;background-color:blue;" >Check Availability</button>
                        </form>
                        <form action="/SlRail/trainschedule/stoppings" method="GET">
                            <input type="hidden" name="train_number" id="trainNumberInput" value="<?= $train['train_number'] ?>">
                            <button type="submit" class="btn-stop">Stopping Stations</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>

    <?php else : ?>
        <p style="margin-left:250px; border:1px solid white; height:20px;"> No available trains found. Please try again.</p>
    <?php endif; ?>


    <?php include('public/includes/footer.php'); ?>

    <p style="text-align: center; padding-top: 100px;">
        <a href="/SlRail/passenger/dashboard" style="font-size:16px;">Go to Dashboard</a>
    </p>

    <script>
       function toggleButtons(bookNowBtnId, passengerFormId) {
        var bookNowBtn = document.getElementById(bookNowBtnId);
        var passengerForm = document.getElementById(passengerFormId);

        if (passengerForm.style.display === "none") {
            passengerForm.style.display = "block";
            bookNowBtn.style.display = "none"; // Hide Book Now button
        } else {
            passengerForm.style.display = "none";
            bookNowBtn.style.display = "block"; // Show Book Now button
        }
    }
    </script>


</body>

</html>

<?php
function getAvailabilityStatus($train)
{
    $days = ['monday' => 'Mon', 'tuesday' => 'Tue', 'wednesday' => 'Wed', 'thursday' => 'Thu', 'friday' => 'Fri', 'saturday' => 'Sat', 'sunday' => 'Sun'];

    $runningDays = [];
    foreach ($days as $day => $shortName) {
        if ($train[$day] == 1) {
            $runningDays[] = $shortName;
        }
    }

    if (count($runningDays) === 7) {
        return 'Daily';
    } else {
        return implode(', ', $runningDays);
    }
}

?>
