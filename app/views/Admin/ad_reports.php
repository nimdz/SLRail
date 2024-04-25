<!DOCTYPE html>
<html>
<head>
    <title>Total Income report</title>
    <style>
        .container {
            display: flex;
        }

        table {
            width: 400px; /* Reduced width */
            border-collapse: collapse;
            margin-left: 50px; /* Adjusted margin */
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        /* New style for card container */
        .card-container {
            width: 300px;
            height: 100px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-left: 150px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center text */
        }

        .card-container h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .total-income-header {
            font-size: 18px; /* Adjust header font size */
            margin-bottom: 10px; /* Add space below header */
        }

        .total-income-value {
            font-size: 36px; /* Larger font size */
            margin: 0; /* Remove any default margins */
            
            font-weight: bold;
            color: #007bff;
        }
         /* Center-align text */
         .center {
            text-align: center;
        }
        /* Style for button */
        .button {
            margin-top: 200px; /* Add space between button and card */
            
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 300px;
            height: 50px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        
    </style>
</head>
<body>
<?php include('public/includes/header.php'); ?>
<?php include('ad_sidebar.php'); ?>
<h2>Incomes</h2>
<div class="container">
    <table>
        <thead>
        <tr>
            <th>Date</th>
            <th>Income for day</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($incomeData as $booking): ?>
            <tr>
                <td><?php echo $booking['departure_date']; ?></td>
                <td><?php echo $booking['total_income']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- New card container for total income -->
    <div class="card-container">
    <h3 class="total-income-header">Total Income</h3>
    <p class="total-income-value">
        
            <?php
            // Calculate total income
            $totalIncome = 0;
            foreach ($incomeData as $booking) {
                $totalIncome += $booking['total_income'];
            }
            echo $totalIncome;
            ?>
        </p>
    </div>
  
    
    <a href="/SlRail/booking/filterForPDF" class="button">Download Report</a>

</div>

<?php include('public/includes/footer.php'); ?>

</body>
</html>
