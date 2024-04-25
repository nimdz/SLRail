<?php
// Set the active link based on the current page
$activeLink = 'track'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Location</title>

    <link rel="stylesheet" type="text/css" href="/SlRail/public/css/Passenger/styles_location.css">
    <link rel="stylesheet" type="text/css" href="/SlRail/public/css/sidebar.css">
</head>
<body>

    <?php include('public/includes/header.php'); ?>

    <?php include('sm_sidebar.php'); ?>

    <div class="row">
        <div class="column">
            <h3>View Live Location</h3>
            <img src="/SlRail/public/assets/map.jpg" alt="Map" class="map-image">
        </div>
    </div>
    <div class="container">
        <h1>Select Train</h1>
            <form action="/SlRail/trainlocation/sm_view" method="post">
                <select id="train_number" name="train_number" required>
                    <?php foreach ($trains as $train): ?>
                        <option value="<?= $train['train_number'] ?>">
                            <?= $train['train_number'] ?> - <?= $train['departure_station'] ?> to <?= $train['destination_station'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="button-primary">View Location</button>
            </form>
        </div>
    </div>

    <?php include('public/includes/footer.php'); ?>

</body>
</html>
