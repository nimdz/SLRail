<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >Train Ticket Booking</title>
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link rel="stylesheet" href="/SlRail/public/css/form.css">

</head>

<body>

    <?php include('public/includes/header.php'); ?>

    <?php include('passenger_sidebar.php'); ?>

    <script src="/SlRail/public/Js/stations.js" type="text/javascript"></script>


    <div class="container1">
        <h1 style="margin-top:10px; margin-left:250px;">Train Ticket Booking</h1>
        <form action="/SlRail/booking/search" method="get" id="bookingForm"style="margin-top:10px; margin-left:300px;">

        <input type="hidden" name="departure_station" value="<?= $departure_station ?>">
        <input type="hidden" name="destination_station" value="<?= $destination_station ?>">
        <input type="hidden" name="departure_date" value="<?= $departure_date ?>">
        <input type="hidden" name="train_number" id="trainNumberInput" value="<?= $train['train_number'] ?>">
        <input type="hidden" name="train_type" id="trainNumberInput" value="<?= $train['train_type'] ?>">
        <input type="hidden" name="departureTime" value="<?= $departureTime ?>">
        <input type="hidden" name="arrivalTime" value="<?= $arrivalTime ?>">
      
            <button type="submit" style="width:200px; height:40px; margin-left:0px; ">Search Train</button>
        </form>
    </div>

    <?php include('public/includes/footer.php'); ?>


</body>

</html>