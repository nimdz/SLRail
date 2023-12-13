<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Trains</title>
    <!-- Add any additional styles or scripts if needed -->
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <style>
        .trains-table {
        width: 80%;
        margin: 20px auto; /* Center the table */
        margin-left: 220px; /* Add left margin to the table */
        border-collapse: collapse;
            }
        </style>

</head>

<body>

    <?php include('public/includes/header.php'); ?>

    <?php include('passenger_sidebar.php'); ?>


        <h1 ><center>Available Trains</center></h1>

        <?php if (isset($availableTrains) && !empty($availableTrains)) : ?>
            <table class="trains-table">
                <thead>
                    <tr>
                        <th>Train Name</th>
                        <th>Class</th>
                        <th>Departure Station</th>
                        <th>Destination Station</th>
                        <th>Departure Date </th>
                        <th>Number Of Passengers</th>
                        <th>Departure Time</th>
                        <th>Arrival Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($availableTrains as $train) : ?>
                        <tr>
                            <td><?= $train['train_name'] ?></td>
                            <td><?= $train['class'] ?></td>
                            <td><?= $train['departure_station'] ?></td>
                            <td><?= $train['destination_station'] ?></td>
                            <td><?= $train['departure_date'] ?></td>
                            <td><?= $number_of_passengers ?></td>
                            <td><?= $train['departure_time'] ?></td>
                            <td><?= $train['arrival_time'] ?></td>
                            <td>
                            <form action="/SlRail/booking/add" method="post">
                                <input type="hidden" name="departure_station" value="<?= $train['departure_station'] ?>">
                                <input type="hidden" name="destination_station" value="<?= $train['destination_station'] ?>">
                                <input type="hidden" name="departure_date" value="<?= $train['departure_date'] ?>">
                                <input type="hidden" name="number_of_passengers" value="<?= $train['number_of_passengers'] ?>">
                                <button type="submit">Book Now</button>
                            </form>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No available trains found. Please try again.</p>
        <?php endif; ?>

    </div>

    <?php include('public/includes/footer.php'); ?>

</body>


