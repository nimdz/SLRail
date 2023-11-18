<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
</head>
<body>
   
   <?php include('includes/header.php'); ?>

    <h1><center>Your Bookings</center></h1>
    <table>
        <thead>
            <tr>
                <th>Departure Station</th>
                <th>Destination Station</th>
                <th>Departure Date</th>
                <th>Number of Passengers</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking): ?>
                <tr>
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
    <p style="text-align: center; padding-top:100px; padding-bottom: 90px; font-size: 24px;">
        <a href="/SlRail/passenger/dashboard">Go to Dashboard</a>
    </p>
    <script>
        // JavaScript function to toggle visibility of update forms
        function updateBooking(bookingId) {
            var form = document.getElementById("updateForm" + bookingId);
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }
        function deleteBooking(bookingId) {
    if (confirm("Are you sure you want to delete this booking?")) {
        // Redirect to the delete URL (you need to define this in your router)
        window.location.href = "/SlRail/booking/deleteBooking?booking_id=" + bookingId;
        if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
    }
}
    </script>
        <?php include('includes/footer.php'); ?>

</body>
</html>
