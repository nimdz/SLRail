<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Train Schedules</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <style>
            th{
              width:2050px;
            }

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
            height: 200px
        }

        .schedule-card > div {
            margin-bottom: 10px;
        }

        .material-symbols-outlined {
            margin-right: 5px;
        }
         
          
    </style>
</head>
<body>
<?php include('public/includes/header.php'); ?>

    <?php include('passenger_sidebar.php'); ?>

    <script src="/SlRail/public/Js/stations.js" type="text/javascript"></script>


    <h2><center> Train Schedules</center></h2>

    <form action="/SlRail/trainschedule/filter" method="get" style="text-align: center; margin-top: 15px; margin-left:130px;">
       
        <label for="startStation"style="margin-left: 100px; ">Start Station:</label>
        <select id="From" name="departure_station" style="margin-left: 10px; width:120px; height:20px; border-radius:60px;"required>
        </select>

        <label for="endStation"style="margin-left: 400px; ">End Station:</label>
        <select id="destination" name="destination_station" style="margin-left: 10px; width:120px; height:20px; border-radius:60px;"required >
        </select>        

        <button type="submit" clss="btn1" style="width:130px; height:30px; border-radius: 50px; margin-left:10px;">Search</button>
    </form>

    <div class="schedule-container" style="margin-left:250px;">
        <?php foreach ($schedules as $schedule): ?>
            <div class="schedule-card">
                  <div class="train_no" style="margin-left:60px;">     
                    <span class="departure-station" style="margin-left:150px; margin-top:0px;"><?= $schedule['departure_station'] ?></span>
                    <span class="arrow"> ⇨</span>
                    <span class="destination-station"><?= $schedule['destination_station'] ?></span>
                </div> 
               <div>
                <span class="material-symbols-outlined" style="font-size: 46px; margin-left:150px;">train</span>
                <?= $schedule['train_number'] ?><?= " -  "?><?= $schedule['train_type'] ?> 
                <span class="destination-station" style="margin-left:400px;"><?="Availability: "?>  <?= getAvailabilityStatus($schedule) ?></span>

               </div>
              
                <div class="time" style="margin-left:320px;">
                  <?= date('h:i', strtotime($schedule['departure_time'])) ?>
                   <?= date('A', strtotime($schedule['departure_time'])) ?>
                   <?=" ● -------------------------------------------------●" ?>
                   <?php
                                // Calculate duration
                                $departureTimestamp = strtotime($schedule['departure_time']);
                                $arrivalTimestamp = strtotime($schedule['arrival_time']);
                                $durationSeconds = $arrivalTimestamp - $departureTimestamp;

                                // Convert duration to hours and minutes
                                $durationHours = floor($durationSeconds / 3600);
                                $durationMinutes = floor(($durationSeconds % 3600) / 60);
                    ?>
                   <?= date('h:i', strtotime($schedule['arrival_time'])) ?>
                   <?= date('A', strtotime($schedule['arrival_time'])) ?>
                </div>
                <div class="stations1" style=" margin-left:320px;">
                  <?= $schedule['departure_station'] ?>
                  <span class="duration"style="margin-left:70px;"><?=$durationHours?>h<?=$durationMinutes?>m
                  <span class="destination-station" style="margin-left:150px;"><?= $schedule['destination_station'] ?></span>
                </div>              
            </div>
        <?php endforeach; ?>
    </div>
    <p style="text-align: center; padding-top: 100px;">
        <a href="/SlRail/passenger/dashboard" style="font-size:16px;">Go to  Dashboard</a>
    </p>
    
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