<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <style>
      
        .booking-card {
            display: flex;
            flex-direction: column;
            border: 1px solid #ccc;
            border-radius: 40px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            margin-left: 300px;
         
        }

        .booking-card > div {
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
        .booking-buttons {
    display: flex; /* Use flexbox */
    justify-content: space-between; /* Align items with space between them */
}

        .btn1 {
            width: 150px;
            height: 40px;
            border-radius: 50px;
        }

        /* Additional styling for update and delete buttons */
        .update-btn {
            background-color: #4CAF50; /* Green */
            color: white;
            margin-right: 10px; /* Add some space between buttons */
        }

        .delete-btn {
            background-color: #f44336; /* Red */
            color: white;
        }

    </style>
        </style>
</head>
<body>
<?php include('public/includes/header.php'); ?>


  <?php include('passenger_sidebar.php'); ?>

  <script src="/SlRail/public/Js/booking.js" type="text/javascript"></script>

    <h3 style="margin-left:400px;"><center>Your Bookings</center></h3>
            <?php foreach ($bookings as $booking): ?>
                <div class="booking-card">
                        <div class="train_no" style="margin-left:20px;">     
                            <span class="departure-station" style="margin-left:150px; margin-top:0px;"><?= $booking['departure_station'] ?></span>
                            <span class="arrow"> ⇨</span>
                            <span class="destination-station"><?= $booking['destination_station'] ?></span>
                        </div> 
                        <div>
                            <span class="material-symbols-outlined" style="font-size: 46px; margin-left:100px;">train</span>
                            <?= $booking['train_number'] ?><?= " -  "?><?= $booking['train_type'] ?>                             
                            <span class="destination-station" style="margin-left:400px;"><?="No of Passengers:"?><?=$booking['number_of_passengers']?></span>

                        </div>

                        <div class="time" style="margin-left:200px; margin-top:10px;">
                            <?= date('h:i', strtotime($booking['departure_time'])) ?>
                            <?= date('A', strtotime($booking['departure_time'])) ?>
                            <?=" ● -------------------------------------------●" ?>
                            <?php
                                // Calculate duration
                                $departureTimestamp = strtotime($booking['departure_time']);
                                $arrivalTimestamp = strtotime($booking['arrival_time']);
                                $durationSeconds = $arrivalTimestamp - $departureTimestamp;

                                // Convert duration to hours and minutes
                                $durationHours = floor($durationSeconds / 3600);
                                $durationMinutes = floor(($durationSeconds % 3600) / 60);
                            ?>
                            <?= date('h:i', strtotime($booking['arrival_time'])) ?>
                            <?= date('A', strtotime($booking['arrival_time'])) ?>
                        </div>
                        <div class="stations1" style=" margin-left:200px;">
                            <?= $booking['departure_station'] ?>
                            <span class="duration"style="margin-left:110px;"><?=$durationHours?>h<?=$durationMinutes?>m
                            <span class="destination-station" style="margin-left:220px;"><?= $booking['destination_station'] ?></span>
                        </div> 
                        <div class="price" style=" margin-left:150px; margin-top:10px;">
                            <?="Selected Class: "?><?= $booking['seat_class']?>
                            <span class="ticket" style="margin-left:400px;"><?="Ticket Price: "?><?= $booking['ticket_price']?></span>
                        </div>  
                            <!-- Update and delete buttons -->
                        <div class="booking-buttons">

                                    <!-- Update button -->
                              <button class="update-btn" onclick="toggleUpdateForm(<?= $booking['booking_id'] ?>)" style="width: 150px; height: 40px; border-radius: 50px;margin-left:200px;">Update</button>

                                    <!-- Update form (initially hidden) -->
                                    <form id="update-form-<?= $booking['booking_id'] ?>" class="update-form" method="POST" action="/SlRail/booking/update" style="display: none;">
                                        <input type="hidden" name="booking_id" value="<?= $booking['booking_id'] ?>">
                                        <input type="hidden" name="train_number" value="<?= $booking['train_number'] ?>">
                                        <input type="hidden" name="train_type" value="<?= $booking['train_type'] ?>">
                                        <input type="text" name="departure_station" placeholder="New Departure Station">
                                        <input type="text" name="destination_station" placeholder="New Destination Station">
                                        <input type="date" name="departure_date" placeholder="New Departure Date">
                                        <input type="number" name="number_of_passengers" placeholder="New Number of Passengers">
                                        <button type="submit">Save</button>
                                    </form>
                                    <button class="delete-btn" onclick="deleteBooking(<?= $booking['booking_id'] ?>)"style="width: 150px; height: 40px; border-radius: 50px;margin-right:200px;">Delete</button>

                        </div> 
                </div>
            <?php endforeach; ?>
      
    <p style="text-align: center; padding-top:100px; padding-bottom: 200px; font-size: 14px;">
        <a href="/SlRail/passenger/dashboard">Go to Dashboard</a>
    </p>
  
    <?php include('public/includes/footer.php'); ?>

</body>
</html>


<script>
    function toggleUpdateForm(bookingId) {
        var updateForm = document.getElementById('update-form-' + bookingId);
        if (updateForm.style.display === 'none') {
            updateForm.style.display = 'block';
        } else {
            updateForm.style.display = 'none';
        }
    }
</script>