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
    <style>


            form {
 display: inline-block;
  align-items: center;
  margin: 20px auto;
  font-family: sans-serif;
  width: 1200px;
  padding: 10px;
}


label {
  display: inline-block;
  margin-right: 20px;
  font-weight: bold;
}

input[type="text"],
input[type="submit"] {
  display: inline-block;
  padding: 5px 10px;
  border: 1px solid #ccc;
  border-radius: 50px;
  margin-right: 30px;

}

input[type="text"] {
  width: 150px;
  border-radius: 50px;
}

input[type="submit"] {
  background-color: #007bff;
  color: white;
  cursor: pointer;
  transition: background-color 0.2s ease-in-out;
}

input[type="submit"]:hover {
  background-color: #0062cc;
}
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
            width:1000px;
            height: 200px;
        }

        .schedule-card > div {
            margin-bottom: 10px;
        }

        .material-symbols-outlined {
            margin-right: 5px;
        }

</style>
</head>

<body class="clearfix">

    <?php include('public/includes/header.php'); ?>

    <?php include('passenger_sidebar.php'); ?>
    <script src="/SlRail/public/Js/stations.js" type="text/javascript"></script>


    <h1 style="margin-left:270px; margin-top:10px;"><center>Train Schedule</center></h1>

    <form action="/SlRail/trainschedule/filter" method="get" style="text-align: center; margin-top: 15px; margin-left:50px;">
       
       <label for="startStation">Start Station:</label>
       <select id="From" name="departure_station" required>
       </select>

       <label for="endStation">End Station:</label>
       <select id="destination" name="destination_station" required>
       </select>        

       <input type="submit" value="Search">
   </form>

    <?php if (isset($availabletrains) && !empty($availabletrains)) : ?>
        <div class="schedule-container" style="margin-left:250px;">
            <?php foreach ($availabletrains as $train) : ?>
                <div class="schedule-card">
                        <div class="train_no" style="margin-left:20px;">     
                            <span class="departure-station" style="margin-left:130px; margin-top:0px;"><?= $train['departure_station'] ?></span>
                            <span class="arrow"> ⇨</span>
                            <span class="destination-station"><?= $train['destination_station'] ?></span>
                        </div> 
                        <div>
                            <span class="material-symbols-outlined" style="font-size: 46px; margin-left:100px;">train</span>
                            <?= $train['train_number'] ?><?= " -  "?><?= $train['train_type'] ?>
                            <span class="destination-station" style="margin-left:500px;"><?="Availability: "?>  <?= getAvailabilityStatus($train) ?></span>
                             

                        </div>

                        <div class="time" style="margin-left:300px; margin-top:10px;">
                            <?= date('h:i', strtotime($train['departure_time'])) ?>
                            <?= date('A', strtotime($train['departure_time'])) ?>
                            <?=" ●---------------------------------------------●" ?>
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
                        <div class="stations1" style=" margin-left:300px;">
                            <?= $train['departure_station'] ?>
                            <span class="duration"style="margin-left:70px;"><?=$durationHours?>h<?=$durationMinutes?>m
                            <span class="destination-station" style="margin-left:130px;"><?= $train['destination_station'] ?></span>
                        </div> 
                             
                    </div>
                <?php endforeach; ?>
            </div>                      

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
