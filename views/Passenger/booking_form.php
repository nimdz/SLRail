<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Train Ticket Booking</title>
        <style>
            .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
        background-color:whitesmoke;
        border-radius: 10px;
    }

    .container h1 {
        font-size: 32px;
        font-weight: bold;
    }

    .container label {
        display: block;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .container input[type="text"],
    .container input[type="date"],
    .container select {
        width: 100%;
        height: 10%;
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 50px;
        background-color: #fff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .container select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath d='M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 20px;
    }

    .container button[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 50px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .container button[type="submit"]:hover {
        background-color: #0062cc;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Train Ticket Booking</h1>
        <form action="/SlRail/booking/add" method="post">
            <label for="departure_station">From:</label>
            <input type="text" id="From" name="departure_station" required placeholder="Enter the starting station">

            <label for="destination_station">To:</label>
            <input type="text" id="destination" name="destination_station" required placeholder="Enter the ending station">

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
                <option value="2">3rd Class:RS200</option>
                <option value="3">2nd Class:Rs300</option>
                <option value="4">1st Class:RS400</option>
            </select>

            <button type="submit">Book Ticket</button>
        </form>
    </div>
</body>
</html>

