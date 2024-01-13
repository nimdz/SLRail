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
</head>

<body class="clearfix">

    <?php include('public/includes/header.php'); ?>

    <?php include('passenger_sidebar.php'); ?>

    <h1 style="margin-left:270px; margin-top:10px;"><center>Available Trains</center></h1>

    <?php if (isset($availableTrains) && !empty($availableTrains)) : ?>
        <table class="trains-table" style="margin-top:5px; margin-left:220px;">
            <thead>
                <tr>
                    <th><span class="material-symbols-outlined">train</span> Train ID</th>
                    <th><span class="material-symbols-outlined">train</span> Train Type</th>
                    <th><span class="material-symbols-outlined">location_on</span> Departure Station</th>
                    <th><span class="material-symbols-outlined">location_on</span> Destination Station</th>
                    <th><span class="material-symbols-outlined">event</span> Departure Date</th>
                    <th><span class="material-symbols-outlined">man</span> Number Of Passengers</th>
                    <th><span class="material-symbols-outlined">schedule</span> Departure Time</th>
                    <th><span class="material-symbols-outlined">schedule</span> Arrival Time</th>
                    <th><span class="material-symbols-outlined">check</span>Train Class </th>
                    <th><span class="material-symbols-outlined">settings</span>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($availableTrains as $train) : ?>
                    <tr>
                        <td><?= $train['train_number'] ?></td>
                        <td><?= $train['train_type'] ?></td>
                        <td><?= $train['departure_station'] ?></td>
                        <td><?= $train['destination_station'] ?></td>
                        <td><?= $departure_date  ?></td>
                        <td><?= $number_of_passengers ?></td>
                        <td><?= date('h:i', strtotime($train['departure_time'])) ?>
                            <?= date('A', strtotime($train['departure_time'])) ?></td>
                        <td><?= date('h:i', strtotime($train['arrival_time'])) ?>
                            <?= date('A', strtotime($train['arrival_time'])) ?></td>
                        <td>
                            <select class="train-class" data-departure="<?= $train['departure_station'] ?>" data-destination="<?= $destination_station ?>">
                                <option value="1">Class 1</option>
                                <option value="2">Class 2</option>
                                <option value="3">Class 3</option>
                            </select>
                        </td>
                        <td>
                            <form action="/SlRail/booking/add" method="post">
                                <input type="hidden" name="train_number" value="<?= $train['train_number'] ?>">
                                <input type="hidden" name="train_type" value="<?= $train['train_type'] ?>">
                                <input type="hidden" name="departure_station" value="<?= $departure_station ?>">
                                <input type="hidden" name="destination_station" value="<?= $destination_station ?>">
                                <input type="hidden" name="departure_date" value="<?= $departure_date  ?>">
                                <input type="hidden" name="number_of_passengers" value="<?= $number_of_passengers ?>">
                                <button type="submit">Book Now</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <table class="ticket-prices" style="overflow-y:auto;">
            <thead>
                <tr>
                    <th><span class="material-symbols-outlined">check</span>Train Class</th>
                    <th><span class="material-symbols-outlined">payments</span>Ticket Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Class 1</td>
                    <td class="class-1-price">RS 0</td>
                </tr>
                <tr>
                    <td>Class 2</td>
                    <td class="class-2-price">RS 0</td>
                </tr>
                <tr>
                    <td>Class 3</td>
                    <td class="class-3-price">RS 0</td>
                </tr>
            </tbody>
        </table>

    <?php else : ?>
        <p style="margin-left:250px; border:1px solid white; height:20px;"> No available trains found. Please try again.</p>
    <?php endif; ?>

    <script src="/SlRail/public/Js/ticket_price.js" type="text/javascript"></script>

<?php include('public/includes/footer.php'); ?>


</body>

</html>
