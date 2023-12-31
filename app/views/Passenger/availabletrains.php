<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Trains</title>
    <!-- Add any additional styles or scripts if needed -->
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
                body, html {
            height: auto;
            min-height: 100%;
            margin: 0;
            padding: 0;
        }
        .material-symbols-outlined {
            display: block;
            margin-right: 5px;
            font-size: 20px;
        }

        /* Style for the table header */
        tr th {
            text-align: left;
            /* Align text to the left for better appearance */
            height: auto;

        }

        .ticket-prices {
            /* Adjust the height as needed */
            overflow-y: auto;
            /* Enable vertical scrolling if content exceeds the height */
            margin-top: 5px;
            /* Add some space between the tables */
            margin-left: 250px;
            display: none; /* Hide the price table by default */
        }
        .clearfix::after {
    content: "";
    display: table;
    clear: both;
}
    </style>
</head>

<body class="clearfix">

    <?php include('public/includes/header.php'); ?>

    <?php include('passenger_sidebar.php'); ?>

    <h1 style="margin-left:270px; margin-top:10px;"><center>Available Trains</center></h1>

    <?php if (isset($availableTrains) && !empty($availableTrains)) : ?>
        <table class="trains-table" style="margin-top:5px;">
            <thead>
                <tr>
                    <th><span class="material-symbols-outlined">train</span> Train ID</th>
                    <th><span class="material-symbols-outlined">train</span> Train Type</th>
                    <th><span class="material-symbols-outlined">location_on</span> Departure Station</th>
                    <th><span class="material-symbols-outlined">location_on</span> Destination Station</th>
                    <th><span class="material-symbols-outlined">event</span> Departure Date</th>
                    <th><span class="material-symbols-outlined">man</span> Number Of Passengers</th>
                    <th><span class="material-symbols-outlined">schedule</span> Departure Time</th>
                    <th><span class="material-symbols-outlined">schedule</span> Arrival Time</th>
                    <th><span class="material-symbols-outlined">check</span>Train Class </th>
                    <th><span class="material-symbols-outlined">settings</span>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($availableTrains as $train) : ?>
                    <tr>
                        <td><?= $train['train_number'] ?></td>
                        <td><?= $train['train_type'] ?></td>
                        <td><?= $train['departure_station'] ?></td>
                        <td><?= $destination_station ?></td>
                        <td><?= $departure_date  ?></td>
                        <td><?= $number_of_passengers ?></td>
                        <td><?= date('h:i', strtotime($train['departure_time'])) ?>
                            <?= date('A', strtotime($train['departure_time'])) ?></td>
                        <td><?= date('h:i', strtotime($train['arrival_time'])) ?>
                            <?= date('A', strtotime($train['arrival_time'])) ?></td>
                        <td>
                            <select class="train-class" data-departure="<?= $train['departure_station'] ?>" data-destination="<?= $destination_station ?>">
                                <option value="1">Class 1</option>
                                <option value="2">Class 2</option>
                                <option value="3">Class 3</option>
                            </select>
                        </td>
                        <td>
                            <form action="/SlRail/booking/add" method="post">
                                <input type="hidden" name="train_number" value="<?= $train['train_number'] ?>">
                                <input type="hidden" name="train_type" value="<?= $train['train_type'] ?>">
                                <input type="hidden" name="departure_station" value="<?= $train['departure_station'] ?>">
                                <input type="hidden" name="destination_station" value="<?= $train['destination_station'] ?>">
                                <input type="hidden" name="departure_date" value="<?= $departure_date  ?>">
                                <input type="hidden" name="number_of_passengers" value="<?= $number_of_passengers ?>">
                                <button type="submit">Book Now</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <table class="ticket-prices" style="overflow-y:auto;">
            <thead>
                <tr>
                    <th><span class="material-symbols-outlined">check</span>Train Class</th>
                    <th><span class="material-symbols-outlined">payments</span>Ticket Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Class 1</td>
                    <td class="class-1-price">RS 0</td>
                </tr>
                <tr>
                    <td>Class 2</td>
                    <td class="class-2-price">RS 0</td>
                </tr>
                <tr>
                    <td>Class 3</td>
                    <td class="class-3-price">RS 0</td>
                </tr>
            </tbody>
        </table>

    <?php else : ?>
        <p style="margin-left:250px; border:1px solid white; height:20px;"> No available trains found. Please try again.</p>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var stationPrices = {
                "Panadura->Colombo Fort": { "1": 120, "2": 80, "3": 60 },
                "Panadura->Moratuwa": { "1": 60, "2": 40, "3": 30 },
                "Panadura->Dehiwala": { "1": 70, "2": 45, "3": 35 },
                "Panadura->MountLavinia": { "1": 80, "2": 50, "3": 45 },
                "Panadura->Wellawatta": { "1": 85, "2": 55, "3": 50 },
                "Panadura->Bambalapitiya": { "1": 90, "2": 60, "3": 55 },
                "Panadura->,Kollupitiya": { "1": 100, "2": 65, "3": 60 },

                // Add more station pairs as needed
            };

            // Add change event listener to all train class select elements
            var classSelects = document.querySelectorAll('.train-class');
            classSelects.forEach(function (select) {
                select.addEventListener('change', updateTicketPrices);
            });

            function updateTicketPrices() {
                // Get selected departure and destination stations
                var departureStation = this.getAttribute('data-departure');
                var destinationStation = this.getAttribute('data-destination');

                // Update ticket prices for all classes
                for (var i = 1; i <= 3; i++) {
                    var priceCell = document.querySelector('.class-' + i + '-price');
                    if (priceCell) {
                        var calculatedPrice = stationPrices[departureStation + '->' + destinationStation][i] || 0;
                        priceCell.textContent = 'RS ' + calculatedPrice;
                    }
                }

                // Show the price table
                document.querySelector('.ticket-prices').style.display = 'block';
            }
        });
    </script>

<?php include('public/includes/footer.php'); ?>


</body>

</html>
