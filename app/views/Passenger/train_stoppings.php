<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SlRail/public/css/Passenger/train_stoppings.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <title>Train Stoppings</title>
</head>
<body>

   <?php include('public/includes/header.php'); ?>

   <?php include('passenger_sidebar.php'); ?>

    <h1>Train Stoppings</h1>

    <?php if (!empty($stoppings)) : ?>
        <table>
            <tr>
                <th>Station Name</th>
                <th>Arrival Time</th>
                <th>Departure Time</th>
            </tr>
            <?php foreach ($stoppings as $stopping) : ?>
                <tr>
                    <td><?= $stopping['station_name'] ?></td>
                    <td><?= date('h:i A', strtotime($stopping['arrival_time'])) ?></td>
                    <td><?= date('h:i A', strtotime($stopping['departure_time'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>No stoppings available.</p>
    <?php endif; ?>

    <p style="text-align: center; padding-top: 100px;">
        <a href="/SlRail/passeneger/dashboard" style="font-size:12px; margin-bottom:100px;">Go to  Dashboard</a>
    </p>

    <?php include('public/includes/footer.php'); ?>

</body>
</html>

