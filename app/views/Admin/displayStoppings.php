<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <title>Display Stoppings</title>
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
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        .update-btn,
        .delete-btn {
            padding: 8px 16px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }
        .update-btn:hover,
        .delete-btn:hover {
            background-color: #0056b3;
        }
        .update-form {
            display: none;
        }
    </style>
</head>
<body>
    <?php include('public/includes/header.php'); ?>
    <?php include('ad_sidebar.php'); ?>
    <div class="container">
        <h1>Stoppings for Selected Schedule</h1>
        <table>
            <thead>
                <tr>
                    <th>Station Name</th>
                    <th>Arrival Time</th>
                    <th>Departure Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stoppings as $stopping): ?>
                    <tr>
                        <td><?= $stopping['station_name'] ?></td>
                        <td><?= date("h:i A", strtotime($stopping['arrival_time'])) ?></td>
                        <td><?= date("h:i A", strtotime($stopping['departure_time'])) ?></td>
                        <td>
                            <button class="update-btn" onclick="toggleUpdateForm(this)">Update</button>
                            <form class="update-form" action="/SlRail/stopping/updateStopping" method="post" style="display: none;">
                                <input type="hidden" name="stopping_id" value="<?= $stopping['stopping_id'] ?>">
                                <div>
                                    <label for="station_name">Station Name:</label>
                                    <input type="text" id="station_name" name="station_name" value="<?= $stopping['station_name'] ?>">
                                </div>
                                <div>
                                    <label for="arrival_time">Arrival Time:</label>
                                    <input type="text" id="arrival_time" name="arrival_time" value="<?= $stopping['arrival_time'] ?>">
                                </div>
                                <div>
                                    <label for="departure_time">Departure Time:</label>
                                    <input type="text" id="departure_time" name="departure_time" value="<?= $stopping['departure_time'] ?>">
                                </div>
                                <button type="submit" class="update-btn" style="margin-left:100px;">Submit</button>
                            </form>
                            <form action="/SlRail/stopping/deleteStopping" method="post">
                                <input type="hidden" name="stopping_id" value="<?= $stopping['stopping_id'] ?>">
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include('public/includes/footer.php'); ?>
    <script>
        function toggleUpdateForm(button) {
            var form = button.nextElementSibling;
            form.style.display = form.style.display === "none" ? "block" : "none";
        }
    </script>
</body>
</html>
