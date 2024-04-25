<?php
// Set the active link based on the current page
$activeLink = 'notifydelay'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notify Delays</title>
    <!-- Include CSS files -->
    <link rel="stylesheet" href="/SlRail/public/css/StationMaster/train_form.css">
    <style>
        .container {
            width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        .row {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-right: 10px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box; /* Ensures padding and border are included in width */
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s; /* Smooth hover transition */
        }

        button:hover {
            background-color: #0056b3;
        }
        #employee_id {
        display: none;
    }
    </style>
</head>
<body>

<!-- Include header -->
<?php include('public/includes/header.php'); ?>

<!-- Include sidebar -->
<?php include('sm_sidebar.php'); ?>

<!-- Main content container -->
<div class="container">
    <h1>Update Train Arrivals</h1>
    <form action="/SlRail/traindelay/showDetails" method="post">
        <!-- Display station name -->
        <div class="row">
            <label for="station_name">Station Name:</label>
            <input type="text" id="station_name" name="station_name" value="<?= $infos['station_name'] ?>" readonly>
        </div>
        <div class="row">
            <input type="text" id="employee_id" name="employee_id" value="<?= $infos['employee_id'] ?>" readonly>
        </div>
        <!-- Select train -->
        <div class="row">
            <label for="schedule_id">Select Train:</label>
            <select id="schedule_id" name="schedule_id" required>
                <?php foreach ($infos['schedules'] as $train): ?>
                    <option value="<?= $train['schedule_id'] ?>">
                        <?= $train['train_number'] ?> - <?= $train['departure_station'] ?> to <?= $train['destination_station'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <!-- Other form inputs can be added here if needed -->
        <!-- Submit button -->
        <div class="row">
            <button type="submit">Search</button>
        </div>
    </form>
</div>

<!-- Include footer -->
<?php include('public/includes/footer.php'); ?>

</body>
</html>
