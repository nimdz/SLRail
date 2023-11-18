<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Ticket Booking</title>
    <link rel="stylesheet" href="/SlRail/public/css/form.css">
</head>

<body>

    <?php include('includes/header.php'); ?>

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
            <label for="price">Price:</label>
            <select id="cost" name="price" required>
                <option value="1">Select Ticket Price</option>
                <option value="2">RS200</option>
                <option value="3">Rs300</option>
                <option value="4">RS400</option>
            </select>

            <button type="submit">Search Train</button>
        </form>
    </div>
    
    <?php include('includes/footer.php'); ?>

</body>

</html>