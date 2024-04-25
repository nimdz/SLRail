
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <title>Train Income</title>
    <style>
        table {
            margin-left: 450px;
            margin-top: 150px;
            width: 60%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php include('public/includes/header.php'); ?>
    <?php include('ad_sidebar.php'); ?>
    <h1 style="margin-left: 400px; margin-top:50px">Train Income for <?= $trainNumber ?> on <?= $date ?></h1>
    
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Total Income</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $date ?></td>
                    <td><?= $totalIncome ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php include('public/includes/footer.php'); ?>
</body>
</html>
