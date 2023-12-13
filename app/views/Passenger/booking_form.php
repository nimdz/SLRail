<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >Train Ticket Booking</title>
    <link rel="stylesheet" href="/SlRail/public/css/form.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <style>
        .container1 {
            margin-top: 30px;
            margin-left: 250px;
            width: 1000px;
            height: 600px;
            border:2px solid black;
        }
        .container1 select {
           width:200px;
           
        }
        .container1 form{
          margin-left: 300px;
          margin-top:80px;
        }
      
    </style>
</head>

<body>

    <?php include('public/includes/header.php'); ?>

    <?php include('passenger_sidebar.php'); ?>

    <script src="/SlRail/public/Js/search_form.js" type="text/javascript"></script>


    <div class="container1">
        <h1 style="margin-top:10px; margin-left:250px;">Train Ticket Booking</h1>
        <form action="/SlRail/booking/search" method="get" id="bookingForm">
            <label for="departure_station">From:</label>
            <select id="From" name="departure_station" required>
            </select>

            <label for="destination_station">To:</label>
            <select id="destination" name="destination_station" required>
            </select>

            <label for="departure_date">Date:</label>
            <input type="date" id="date" name="departure_date"  style="width:200px;"required>

            <label for="number_of_passengers">Passengers:</label>
            <select id="passengers" name="number_of_passengers" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br>

            <button type="submit" style="width:200px;">Search Train</button>
        </form>
    </div>

    <?php include('public/includes/footer.php'); ?>

</body>

</html>
