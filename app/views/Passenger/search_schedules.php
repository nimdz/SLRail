<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Train Schedules</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link rel="stylesheet" href="/SlRail/public/css/form.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        th {
            width: 1050px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: Arial, sans-serif;
            width: 1000px;
            height: 500px; /* Adjusted height */
            padding: 20px;
            background-color: white;
            border-radius: 50px;
            margin-left: 300px;
            border:2px solid black;

        }

        label {
            font-size: 16px;
            margin-top: 10px;
            font-weight: bold;
            width: 200px;
            text-align: right;
        }

        select, #date {
            width: 200px;
            height: 30px;
            border-radius: 50px;
            margin-top: 10px;
            margin-left: 0px;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin-bottom: 20px;
            margin-top: 30px;
        }

        .form-row label {
            width: auto;
        }

        .form-row select {
            flex: 1;
            margin-left: 20px;
        }

        .form-row1 {
            display: flex;
            align-items: center;
            margin-top: 20px; /* Adjusted margin-top */
           margin-left: 20px;
        } 

        .form-row1 label {
            margin-left: 20px;
        }

        button[type="submit"] {
            width: 200px;
            height: 40px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: 150px;
        }

        button[type="submit"]:hover {
            background-color: #45A049;
        }
    </style>
</head>
<body>
<?php include('public/includes/header.php'); ?>
<?php include('passenger_sidebar.php'); ?>
<script src="/SlRail/public/Js/stations.js" type="text/javascript"></script>


<form action="/SlRail/trainschedule/filter" method="get" style="margin-right:10px; margin-top:50px;">

<h1 style="text-align: center; font-size:32px;">Live Train Schedules</h1>

    <div class="form-row">
        <label for="startStation" style="margin-left:100px; margin-top:80px;">Start Station:</label>
        <select id="From" name="departure_station"  style="margin-left:40px; margin-top:80px; background-color:whitesmoke;"required></select>

        <label for="endStation" style="margin-left:100px; margin-top:80px;">End Station:</label>
        <select id="destination" name="destination_station"  style="margin-left:40px; margin-top:80px;  background-color:whitesmoke;"required></select>
    </div>

    <div class="form-row1">
        <label for="departure_date"style="margin-right:10px; margin-top:20px; margin-left:20px;">Date:</label>
        <input type="date" id="date" name="departure_date" required>
    </div>

    <button type="submit" style="margin-right:10px; margin-top:40px;">Search</button>
</form>

<?php include('public/includes/footer.php'); ?>

</body>
</html>
