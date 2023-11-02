<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="time"],
        input[type="date"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            width: 80%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <title>Add Train Schedule</title>
</head>
<body>
    <div class="container">
        <h2>Add Train Schedule</h2>
        <form action="/SlRail/schedule/add" method="post">
            <label for="departure_station">Departure Station:</label>
            <input type="text" name="departure_station" id="departure_station" required>

            <label for="destination_station">Destination Station:</label>
            <input type="text" name="destination_station" id="destination_station" required>

            <label for="departure_time">Departure Time:</label>
            <input type="time" name="departure_time" id="departure_time" required>

            <label for="arrival_time">Arrival Time:</label>
            <input type="time" name="arrival_time" id="arrival_time" required>

            <label for="schedule_date">Schedule Date:</label>
            <input type="date" name="schedule_date" id="schedule_date" required>

            <button type="submit">Add Schedule</button>
        </form>
    </div>
</body>
</html>

