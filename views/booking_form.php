<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Ticket Booking</title>
    <link rel="stylesheet" href="/SlRail/public/css/form.css">
</head>
<body>
    <div class="container">
        <h1>Train Ticket Booking</h1>
        <form action="/SlRail/booking/add" method="POST">
            <label for="departure_station">From:</label>
            <input type="text" id="From" name="departure" required placeholder="Enter the starting station">

            <label for="destination_station">To:</label>
            <input type="text" id="destination" name="destination" required placeholder="Enter the ending station">

            <label for="departure_date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="number_of_passengers">Passengers:</label>
            <select id="passengers" name="passengers" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <button type="submit">Book Ticket</button>
        </form>
    </div>
</body>
</html>

