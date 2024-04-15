<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <title>Add Stopping Details</title>
    <style>
        /* Add your CSS styles here */
        .form-container{
            margin: 20px auto;
            width: 50%;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 40px;
        }
        label {
            font-weight: bold;
        }
        select, input[type="text"], input[type="submit"] {
            width: calc(100% - 20px);
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include('public/includes/header.php'); ?>
    <?php include('ad_sidebar.php'); ?>
    <h2 style="margin-left:450px; margin-top:40px;font-family:'Courier New', Courier, monospace; font-size:bold;">Add Stopping Details</h2>

    <div class="form-container">
        <form action="/SlRail/stopping/addStopping" method="post">
            <div class="form-group">
                <label for="schedule_id">Select a Schedule:</label>
                <select id="schedule_id" name="schedule_id" required>
                    <?php foreach ($schedules as $schedule): ?>
                        <option value="<?= $schedule['schedule_id'] ?>">
                            <?= $schedule['train_number'] ?> - <?= $schedule['departure_station'] ?> to <?= $schedule['destination_station'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="station_name">Select a Station:</label>
                <select id="station_name" name="station_name" required>
                    <!-- Options for stoppings will be loaded via AJAX -->
                </select>
            </div>
            <div class="form-group">
                <label for="arrival_time">Arrival Time:</label>
                <input type="text" id="arrival_time" name="arrival_time" required>
            </div>
            <div class="form-group">
                <label for="departure_time">Departure Time:</label>
                <input type="text" id="departure_time" name="departure_time" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Add Stopping">
            </div>
        </form>
    </div>

    <?php include('public/includes/footer.php'); ?>
    <script>
        // Function to fetch stoppings based on the selected schedule ID via AJAX
        function fetchStoppings(scheduleId) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/SlRail/stopping/getStoppingsByScheduleId?schedule_id=' + scheduleId, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var stoppings = JSON.parse(xhr.responseText);
                    var stoppingSelect = document.getElementById('station_name');
                    stoppingSelect.innerHTML = ''; // Clear previous options
                    stoppings.forEach(function (stopping) {
                        var option = document.createElement('option');
                        option.text = stopping;
                        option.value = stopping;
                        stoppingSelect.appendChild(option);
                    });
                } else {
                    console.log('Request failed. Status: ' + xhr.status);
                }
            };
            xhr.send();
        }

        // Event listener to fetch stoppings when schedule is selected
        document.getElementById('schedule_id').addEventListener('change', function () {
            var selectedScheduleId = this.value;
            fetchStoppings(selectedScheduleId);
        });

        // Event listener to submit form
        document.getElementById('stoppingForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission
            // Perform form validation if needed
            // Then submit form via AJAX or handle submission as needed
        });
    </script>
</body>
</html>
