<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Train</title>
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        #container {
            margin-top:20px;
            max-width: 900px;
            margin-left: 250px ;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            height: 800px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            overflow-y: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%234d4d4d" width="18px" height="18px"><path d="M7 10l5 5 5-5H7z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px top 50%;
            background-size: 16px;
            padding-right: 32px;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include('public/includes/header.php'); ?>
    <?php include('ad_sidebar.php'); ?>

    <div id="container">
        <h2>update Train</h2>
        <form action="/SlRail/train/updateTrain" method="post">

              <input type="hidden" name="train_number" value="<?= $train_number ?>">
 

            <label for="train_type">Train Type:</label>
            <select id="train_type" name="train_type" required>
                <option value="Express">Express</option>
                <option value="Intercity">Intercity</option>
                <option value="Slow">Slow</option>
            </select>

            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" required>

            <label for="seats_class1">Available Seats Class 1:</label>
            <input type="number" id="seats_class1" name="seats_class1" required>

            <label for="seats_class2">Available Seats Class 2:</label>
            <input type="number" id="seats_class2" name="seats_class2" required>

            <label for="seats_class3">Available Seats Class 3:</label>
            <input type="number" id="seats_class3" name="seats_class3" required>

            <button type="submit">Add Train</button>
        </form>
    </div>

    <?php include('public/includes/footer.php'); ?>
</body>
</html>
