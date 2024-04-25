<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income Reports</title>
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            width: 300px;
            height: 200px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            margin: 0 20px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card h3 {
            margin-top: 0;
            color: #333;
        }
        .card p {
            color: #666;
            font-size: 14px;
            text-align: center;
        }
        .card-icon {
            font-size: 36px;
            color: #007bff;
        }
    </style>
</head>
<body>
    <?php include('public/includes/header.php'); ?>
    <?php include('ad_sidebar.php'); ?>

    <div class="container">
       <!--<a href="/SlRail/booking/displayIncomeForTrain" class="card" >-->
       <a href="/SlRail/stopping/getScheduleInfo" class="card">
            <span class="card-icon">🚆</span>
            <h3>Report By Train</h3>
            <p>View income report for a specific train</p>
    </a>
       
        <a href="/SlRail/admin/IncomeByDate" class="card" >
            <span class="card-icon">📅</span>
            <h3>Report for Date Range</h3>
            <p>View income report for a specific date range</p>
        </div>
    </div>

    <?php include('public/includes/footer.php'); ?>
</body>
</html>
