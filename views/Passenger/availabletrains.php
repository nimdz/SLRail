<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Trains</title>
    <!-- Add any additional styles or scripts if needed -->
    <link rel="stylesheet" href="/SlRail/public/css/table.css">

</head>

<body>

    <?php include('includes/header.php'); ?>

        <h1 ><center>Available Trains</center></h1>

        <?php if (isset($availableTrains) && !empty($availableTrains)) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Train Name</th>
                        <th>Class</th>
                        <th>Departure Station</th>
                        <th>Destination Station</th>
                        <th>Departure Date </th>
                        <th>Departure Time</th>
                        <th>Number Of Passengers</th>
                        <th>Price</th>
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
                            <td><?= $train['number_of_passengers'] ?></td>
                            <td><?= $train['time'] ?></td>
                            <td><?= $train['price'] ?></td>
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

    <?php include('includes/footer.php'); ?>

</body>


