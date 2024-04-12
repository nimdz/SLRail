<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Trains</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <style>
        .train-table{
            width: 80%;
            margin: 20px auto; /* Center the table */
            margin-left: 240px; /* Add left margin to the table */
            border-collapse: collapse;
            }
            th{
              width:200px;
            }

    </style>
</head>
<body>
<?php include('public/includes/header.php'); ?>

    <?php include('td_sidebar.php'); ?>

    <h2 style="margin-top:50px;"><center> All Trains</center></h2>
    <table class="train-table">
        <thead>
            <tr>
                <th><span class="material-symbols-outlined">train</span> Train No</th>
                <th><span class="material-symbols-outlined">train</span> Train Type</th>
                <th><span class="material-symbols-outlined">train</span> Train Model</th>
                <th><span class="material-symbols-outlined">man</span> Capacity</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($trains as $train): ?>
                <tr>
                   <td><?= $train['train_number'] ?></td>
                   <td><?= $train['train_type'] ?></td>
                   <td><?= $train['train_model'] ?></td>
                   <td><?= $train['capacity'] ?></td>

                   
                </tr>

               
            <?php endforeach; ?>
        </tbody>
    </table>
    <p style="text-align: center; padding-top: 100px;">
        <a href="/SlRail/traindriver/dashboard" style="font-size:16px;">Go to  Dashboard</a>
    </p>
    
    <?php include('public/includes/footer.php'); ?>


</body>
</html>
