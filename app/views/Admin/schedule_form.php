<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Schedules</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link rel="stylesheet" href="/SlRail/public/css/form.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        form {
            max-width: 1000px;
            max-height: 1000px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 32px;
            margin-bottom: 30px;
        }

        .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-row label {
            width: 200px;
            font-size: 16px;
            font-weight: bold;
            margin-right: 20px;
        }

        .form-row select {
            flex: 1;
            height: 40px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 0 10px;
            font-size: 16px;
        }

        button[type="submit"] {
            width: 200px;
            height: 40px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45A049;
        }
    </style>
</head>
<body>
<?php include('public/includes/header.php'); ?>
<?php include('ad_sidebar.php'); ?>

<h1 style="margin-top:30px; margin-left:300px">Add Train Schedules</h1>
<form style="margin-left: 350px;" action="/SlRail/trainschedule/getStationsByRoute" method="get">

   

    <div class="form-row">
        <label for="route">Select route for add schedule:</label>
        <select id="route" name="route" required>
            <option value="" disabled selected>Select Train Route</option>
            <option value="1">coast_line</option>
            <option value="2">main_line</option>
            <option value="3">matale_line</option>
            <option value="4">puttalam_line</option>
            <option value="5">kv_line</option>
            <option value="6">eastern_line</option>
        </select>
    </div>

    <center><button type="submit">Select</button></center>
</form>

<?php include('public/includes/footer.php'); ?>

</body>
</html>