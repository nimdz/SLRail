<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <title>Select Schedule</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: 250px;
            margin-top: 200px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            text-align: center;
        }
        label {
            font-weight: bold;
            margin-right: 10px;
        }
        select {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
            width: 300px;
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include('public/includes/header.php'); ?>
    <?php include('ad_sidebar.php'); ?>
    <div class="container">
        <h1>Select Schedule</h1>
        <form action="/SlRail/stopping/displayStoppings" method="get">
            <label for="schedule_id">Select a Schedule:</label>
            <select id="schedule_id" name="schedule_id" required>
                <?php foreach ($schedules as $schedule): ?>
                    <option value="<?= $schedule['schedule_id'] ?>">
                        <?= $schedule['train_number'] ?> - <?= $schedule['departure_station'] ?> to <?= $schedule['destination_station'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">View Stoppings</button>
        </form>
    </div>
    <?php include('public/includes/footer.php'); ?>
</body>
</html>
