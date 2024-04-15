<?php
// Set the active link based on the current page
$activeLink = 'seasons'; // Change this value according to the current page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Seasons</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    
    <style>
        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 1100px;
            margin-left: 300px;
        }

        th, td {
            padding: 15px;
        }

        p {
            font-size: 32px;
        }

        h1 {
            font-size: 42px;
            margin-left: 300px;
            margin-top: 50px;
        }

    </style>
</head>
<body>
<?php include('public/includes/header.php'); ?>

<?php include('sm_sidebar.php'); ?>


    <h1><center>Seasons</center></h1>
    <table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Departure Station</th> 
            <th>Destination Station</th>
            <th>Class</th>
            <th>Time Period</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($seasons as $season): ?>
            <tr>
                <td><?= $season['name'] ?></td> 
                <td><?= $season['departure_station'] ?></td>
                <td><?= $season['destination_station'] ?></td>
                <td><?= $season['selectedClass'] ?></td>
                <td><?= $season['time_period'] ?></td>
                
                <td>
                    <!-- Add a condition to hide buttons when update form is visible -->
                    <?php if (!isset($_POST['season_id']) || $_POST['season_id'] !== $season['season_id']): ?>
                        <button class="confirm" onclick="calculateSeasonTicketPrice(<?= $season['season_id'] ?>)">Confirm</button>
                        
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


    <script>
    function calculateSeasonTicketPrice() {
    var departureStation = document.getElementById('departureStation').value;
    var destinationStation = document.getElementById('destinationStation').value;
    var selectedClass = document.getElementById('selectedClass').value;
    var timePeriod = document.getElementById('time_period').value;

    var ticketPrice = getTicketPrice(departureStation, destinationStation, selectedClass);

    if (ticketPrice !== null) {
        
        var week= ticketPrice*2*7;
        if(timePeriod=='1 week'){
            return week;
        }else if(timePeriod=='1 month'){
            return week*4;
        }else if(timePeriod=='3 month'){
            return week*4*3;
        }else if(timePeriod=='4 month'){
            return week*4*4;
        }
        
    } else {
        console.log('Ticket price data not found for the selected stations and class.');
    }

    
}
</script>
    
       <?php include('public/includes/footer.php'); ?>

</body>
</html>