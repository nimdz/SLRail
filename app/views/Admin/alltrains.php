<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Trains</title>
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <!-- Add any additional CSS files or stylesheets here -->
    <style>
        /* public/css/alltrains.css */

/* Styles for the table container */
.table-container {
    margin: 20px auto;
    width: 80%;
    margin-left:250px;
    height:800px;
}

/* Styles for the table */
table {
    width: 100%;
    border-collapse: collapse;
}

/* Styles for table header */
thead {
    background-color: #f2f2f2;
}

/* Styles for table header cells */
th {
    padding: 10px;
    text-align: left;
}

/* Styles for table body cells */
td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

/* Styles for update and delete buttons */
.update-btn,
.delete-btn {
    display: inline-block;
    padding: 5px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.update-btn {
    background-color: #007bff;
    color: #fff;
}

.delete-btn {
    background-color: #dc3545;
    color: #fff;
}

/* Hover styles for buttons */
.update-btn:hover,
.delete-btn:hover {
    background-color: #0056b3;
}
</style>
</head>
<body>
    <?php include('public/includes/header.php'); ?>
    <?php include('ad_sidebar.php'); ?>

    <h2 style="margin-left:650px; font-family:'Courier New', Courier, monospace; font-size:bold;">All Trains</h2>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Train Number</th>
                    <th>Train Type</th>
                    <th>Capacity</th>
                    <th>Seats Class 1</th>
                    <th>Seats Class 2</th>
                    <th>Seats Class 3</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trains as $train): ?>
                    <tr>
                        <td><?= $train['train_number'] ?></td>
                        <td><?= $train['train_type'] ?></td>
                        <td><?= $train['capacity'] ?></td>
                        <td><?= $train['available_seats_Class1'] ?></td>
                        <td><?= $train['available_seats_Class2'] ?></td>
                        <td><?= $train['available_seats_Class3'] ?></td>
                        <td>
                            <a href="/SlRail/train/loadForm?train_number=<?= $train['train_number'] ?>" class="update-btn">Update</a>
                            <a href="/SlRail/train/deleteTrain?train_number=<?= $train['train_number'] ?>" class="delete-btn">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php include('public/includes/footer.php'); ?>
</body>
</html>
