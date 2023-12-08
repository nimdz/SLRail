<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Ticket Booking</title>
    <link rel="stylesheet" href="/SlRail/public/css/form.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <style>
        .container1{
            margin-top: 50px;
            margin-left: 250px;
            width: 1200px;
            height:600px;
        }
   </style>
</head>

<body>

   <?php include('includes/header.php'); ?>

    <?php include('passenger_sidebar.php'); ?>


    <div class="container1">
        <h1>Train Ticket Booking</h1>
        <form action ="/SlRail/booking/search"  method="get">
            <label for="departure_station">From:</label>
            <input type="text" id="From" name="departure_station" required placeholder="Enter the starting station">

            <label for="destination_station">To:</label>
            <input type="text" id="destination" name="destination_station" required
                placeholder="Enter the ending station">

            <label for="departure_date">Date:</label>
            <input type="date" id="date" name="departure_date" required>

            <label for="number_of_passengers">Passengers:</label>
            <select id="passengers" name="number_of_passengers" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <button type="submit">Search Train</button>
        </form>
    </div>
    
    <?php include('includes/footer.php'); ?>

</body>

</html>