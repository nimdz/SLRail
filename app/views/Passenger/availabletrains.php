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

        .schedule-card > div {
            margin-bottom: 10px;
        }

        .material-symbols-outlined {
            margin-right: 5px;
        }
         .btn1{
            width:400px;
            height:200px;
            border-radius: 50px;
        }
          
    </style>
</head>

<body class="clearfix">

<?php include('public/includes/header.php'); ?>

    <?php include('passenger_sidebar.php'); ?>


    <h3 style="margin-left:200px; margin-top:10px;"><center>Available Trains</center></h3>

    <?php if (isset($availableTrains) && !empty($availableTrains)) : ?>
       
            <div class="schedule-container" style="margin-left:350px;">
            <?php foreach ($availableTrains as $train) : ?>
                    <div class="schedule-card">
                        <div class="train_no" style="margin-left:20px;">     
                            <span class="departure-station" style="margin-left:150px; margin-top:0px;"><?= $train['departure_station'] ?></span>
                            <span class="arrow"> ⇨</span>
                            <span class="destination-station"><?= $destination_station ?></span>
                        </div> 
                        <div>
                            <span class="material-symbols-outlined" style="font-size: 46px; margin-left:100px;">train</span>
                            <?= $train['train_number'] ?><?= " -  "?><?= $train['train_type'] ?>                             
                            <span class="destination-station" style="margin-left:400px;"><?="No of Passengers:"?><?=$number_of_passengers?></span>
                            <i class="fa-solid fa-person-seat"></i>

                        </div>

                        <div class="time" style="margin-left:200px; margin-top:10px;">
                            <?= date('h:i', strtotime($train['departure_time'])) ?>
                            <?= date('A', strtotime($train['departure_time'])) ?>
                            <?=" ● -------------------------------------------●" ?>
                            <?php
                                // Calculate duration
                                $departureTimestamp = strtotime($train['departure_time']);
                                $arrivalTimestamp = strtotime($train['arrival_time']);
                                $durationSeconds = $arrivalTimestamp - $departureTimestamp;

                                // Convert duration to hours and minutes
                                $durationHours = floor($durationSeconds / 3600);
                                $durationMinutes = floor(($durationSeconds % 3600) / 60);
                            ?>
                            <?= date('h:i', strtotime($train['arrival_time'])) ?>
                            <?= date('A', strtotime($train['arrival_time'])) ?>
                        </div>
                        <div class="stations1" style=" margin-left:200px;">
                            <?= $train['departure_station'] ?>
                            <span class="duration"style="margin-left:70px;"><?=$durationHours?>h<?=$durationMinutes?>m
                            <span class="destination-station" style="margin-left:130px;"><?= $train['destination_station'] ?></span>
                        </div> 
                        <div class="price" style=" margin-left:150px; margin-top:10px;">
                            <?="Selected Class: "?><?= $seat_class?>
                            <span class="ticket" style="margin-left:400px;"><?="Ticket Price: "?><?= $price?></span>
                        </div>   
                        <form action="/SlRail/booking/add" method="post">
                                <input type="hidden" name="train_number" value="<?= $train['train_number'] ?>">
                                <input type="hidden" name="train_type" value="<?= $train['train_type'] ?>">
                                <input type="hidden" name="departure_station" value="<?= $departure_station ?>">
                                <input type="hidden" name="destination_station" value="<?= $destination_station ?>">
                                <input type="hidden" name="departure_date" value="<?= $departure_date  ?>">
                                <input type="hidden" name="number_of_passengers" value="<?= $number_of_passengers ?>">
                                <input type="hidden" name="seat_class" value="<?= $seat_class ?>">
                                <input type="hidden" name="ticket_price" value="<?= $price ?>">
                                <input type="hidden" name="departure_time" value="<?= $train['departure_time'] ?>">
                                <input type="hidden" name="arrival_time" value="<?= $train['arrival_time']  ?>">
                                <button type="submit" clss="btn1" style="width:150px; height:40px; border-radius: 50px; margin-left:350px;">Book Now</button>
                            </form>            
                    </div>
                <?php endforeach; ?>
            </div>                      
    <?php else : ?>
        <p style="margin-left:250px; border:1px solid white; height:20px;"> No available trains found. Please try again.</p>
    <?php endif; ?>

   

    <?php include('public/includes/footer.php'); ?>

</body>

</html>
