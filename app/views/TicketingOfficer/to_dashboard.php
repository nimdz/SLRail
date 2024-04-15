<?php
// Set the active link based on the current page
$activeLink = 'dashboard'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketingOfficer Dashboard</title>
    <link rel="stylesheet" href="/SlRail/public/css/dashboard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Card style */
        .card {
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 300px; /* Adjust card width */
            height: 350px; /* Adjust card height */
            padding: 20px;
            background-color: white;
            margin-top: 100px;
        }

        /* Chart title style */
        .card-title {
            margin-bottom: 20px; /* Add spacing between title and chart */
            text-align: center;
        }

        /* Chart canvas style */
        #bookingChart {
            width: 100%;
            height: 100%; /* Set canvas height to 100% of parent container */
        }
    </style>
</head>
<body>

<?php include('public/includes/header.php'); ?>
<?php include('to_sidebar.php'); ?>

<div class="container">
    <div class="card">
        <h5 class="card-title">Bookings for Today</h5>
        <canvas id="bookingChart"></canvas>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/SlRail/booking/getBookingDataForChart',
            type: 'GET',
            success: function(response) {
                var data = JSON.parse(response);

                var ctx = document.getElementById('bookingChart').getContext('2d');
                var bookingChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['1st Class', '2nd Class', '3rd Class'],
                        datasets: [{
                            data: [data['Class1'], data['Class2'], data['Class3']],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.6)',
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 206, 86, 0.6)',
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        aspectRatio: 1, // Set the aspect ratio to 1 for a perfect circle
                        legend: {
                            display: true,
                            position: 'right',
                        },
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItem, data) {
                                    var dataset = data.datasets[tooltipItem.datasetIndex];
                                    var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                                        return previousValue + currentValue;
                                    });
                                    var currentValue = dataset.data[tooltipItem.index];
                                    var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                                    return percentage + '%';
                                }
                            }
                        }
                    }
                });
            }
        });
    });
</script>

<?php include('public/includes/footer.php'); ?>
    
</body>
</html>
