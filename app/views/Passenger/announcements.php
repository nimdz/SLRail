<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <style>
     .ann-table {
            width: 1000px;
            margin: 20px auto; /* Center the table */
            margin-left: 300px; /* Add left margin to the table */
            border-collapse: collapse;
        }
    </style>

</head>
<body>

    <?php include('public/includes/header.php'); ?>

    <?php include('passenger_sidebar.php'); ?>


    <h1><center>Announcements</center></h1>
    <table class="ann-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($announcements as $ann): ?>
                <tr>
                    <td><?= $ann['ann_id'] ?></td>
                    <td><?= $ann['title'] ?></td>
                    <td><?= $ann['description'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p style="text-align: center; padding-top:100px; padding-bottom: 90px; font-size: 16px;">
        <a href="/SlRail/passenger/dashboard">Go to Dashboard</a>
    </p>
    
    <?php include('public/includes/footer.php'); ?>
    
</body>
</html>