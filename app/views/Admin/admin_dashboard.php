<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/SlRail/public/css/p_dashboard.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        /* Styling for cards */
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            display: inline-block;
            width: 350px; /* Adjust width as needed */
            height: 180px; /* Adjust height as needed */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            transition: transform 0.3s ease;
        }

        /* Alternate background color for cards */
        .card:nth-child(even) {
            background-color: #f0f0f0;
        }

        /* Title styling */
        .card h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        /* Count styling */
        .count {
            font-size: 32px;
            font-weight: bold;
            color: #007bff;
        }

        /* Center-align text */
        .center {
            text-align: center;
        }

        /* Header styling */
        h1 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Hover effect */
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .icon-count {
    display: flex;
    align-items: center;
}


/* CSS for spacing between icon and count */
.count {
    margin-left: 60px; /* Adjust as needed */
    margin-top:20px;
}
    </style>
</head>
<body>

<?php include('public/includes/header.php'); ?>
<?php include('ad_sidebar.php'); ?>
<?php include('public/includes/footer.php'); ?>
<h1>Welcome Admin!</h1>


<div class="content center" style="margin-top: 50px;">
    <div class="card">
        <h2>Number of Passengers</h2>
        <div class="icon-count">
            <span class="material-icons" style="font-size:42px;margin-left:60px;margin-top: 20px;"> person</span>
            <p class="count"><?php echo $passenger_count; ?></p>
        </div>
    </div>
    <div class="card">
        <h2>Number of Trains</h2>
     <div class="icon-count">
        <span class="material-symbols-outlined" style="font-size:42px;margin-left:60px;margin-top: 20px;">train</span>
        <p class="count"><?php echo $train_count; ?></p>
      </div>
    </div>
      <div class="card">
        <h2>Number of Employees</h2>
        <p class="count"><?php echo $employee_count; ?></p>
    </div>
    <div class="card">
        <h2>Number of Stations</h2>
        <p class="count"><?php echo $station_count; ?></p>
    </div>
</div>

</body>
</html>
