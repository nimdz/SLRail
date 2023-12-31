<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
</head>
<body>
<?php include('public/includes/header.php'); ?>


  <?php include('passenger_sidebar.php'); ?>

  <script src="/SlRail/public/Js/booking.js" type="text/javascript"></script>

    <h1><center>Your Bookings</center></h1>
    <table class="booking-table" >
        <thead>
            <tr>
                <th><span class="material-symbols-outlined">train</span>Train ID</th>
                <th><span class="material-symbols-outlined">train</span>Train Type</th>
                <th><span class="material-symbols-outlined">location_on</span>Departure Station</th>
                <th><span class="material-symbols-outlined">location_on</span>Destination Station</th>
                <th><span class="material-symbols-outlined">event</span>Departure Date</th>
                <th><span class="material-symbols-outlined">man</span>Number of Passengers</th>
                <th><span class="material-symbols-outlined">settings</span>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking): ?>
                <tr>
                    <td><?= $booking['train_number'] ?></td>
                    <td><?= $booking['train_type'] ?></td>
                    <td><?= $booking['departure_station'] ?></td>
                    <td><?= $booking['destination_station'] ?></td>
                    <td><?= $booking['departure_date'] ?></td>
                    <td><?= $booking['number_of_passengers'] ?></td>
                    <td>
                        <button onclick="updateBooking(<?= $booking['booking_id'] ?>)">Update</button>
                        <button onclick="deleteBooking(<?= $booking['booking_id'] ?>)">Delete</button>
                    </td>
                </tr>



                <!-- Update Booking Form -->
                <tr id="updateForm<?= $booking['booking_id'] ?>" style="display: none;">
                    <td colspan="5">
                        <form method="POST" action="/SlRail/booking/update">
                            <input type="hidden" name="booking_id" value="<?= $booking['booking_id'] ?>">
                            <input type="hidden" name="train_number" value="<?= $booking['train_number'] ?>">
                            <input type="hidden" name="train_type" value="<?= $booking['train_type'] ?>">
                            <input type="text" name="departure_station" placeholder="New Departure Station">
                            <input type="text" name="destination_station" placeholder="New Destination Station">
                            <input type="date" name="departure_date" placeholder="New Departure Date">
                            <input type="number" name="number_of_passengers" placeholder="New Number of Passengers">
                            <button type="submit">Save</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p style="text-align: center; padding-top:100px; padding-bottom: 200px; font-size: 14px;">
        <a href="/SlRail/passenger/dashboard">Go to Dashboard</a>
    </p>
  
    <?php include('public/includes/footer.php'); ?>

</body>
</html>
