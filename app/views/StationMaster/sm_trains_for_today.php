<?php
// Set the active link based on the current page
$activeLink = 'updateLocation'; // Change this value according to the current page


// Check if the button has been clicked today
$updateCompleted = isset($_SESSION['update_completed']) && $_SESSION['update_completed'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    // You can add your update logic here
    // For demonstration, let's just set the session variable
    $_SESSION['update_completed'] = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Train Location</title>
    <!-- Include the CSS file -->
    <style>
        /* Add custom styles for the table */
        table {
            width: 80%; /* Adjust table width */
            max-width: 800px; /* Add maximum width to prevent overflow */
            margin: 20px auto; /* Center the table */
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            width: auto; /* Adjust column width */
            max-width: 200px; /* Add maximum width to prevent long text overflow */
            white-space: nowrap; /* Prevent wrapping text */
            overflow: hidden; /* Hide overflowing text */
            text-overflow: ellipsis; /* Add ellipsis for overflow text */
        }

        th {
            background-color: #f2f2f2;
        }

        .update-btn {
            display: <?php echo $updateCompleted ? 'none' : 'inline-block'; ?>; /* Hide button if update is completed */
        }
    </style>
</head>
<body>
    <?php include('public/includes/header.php'); ?>
    <?php include('sm_sidebar.php'); ?>
    <h1 style="margin-left:320px; margin-top:10px;">Update Arrival Time</h1>
    <center>
        <table>
            <thead>
                <tr>
                    <th>Train Number</th>
                    <th>Arrival Time</th>
                    <th>Departure Time</th>
                    <th>Update Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $train): ?>
                    <tr>
                        <td><?php echo $train['train_number']; ?></td>
                        <td><?php echo $train['arrival_time']; ?></td>
                        <td><?php echo $train['departure_time']; ?></td>
                        <td>
                            <?php if (!$updateCompleted): ?>
                                <form action="/SlRail/trainlocation/sm_updateArrivals" method="post" onsubmit="return updateArrivalTime(this)">
                                    <input type="hidden" name="train_number" value="<?php echo $train['train_number']; ?>">
                                    <button type="submit" class="update-btn">Update Time</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
    <?php include('public/includes/footer.php'); ?>
</body>
</html>
