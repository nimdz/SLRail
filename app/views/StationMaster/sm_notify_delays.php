<?php
// Assuming $train_times contains the arrival_time and departure_time
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Status Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .row {
            margin-bottom: 10px;
        }

        label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
        }

        input[type="text"], select {
            width: 60%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<!-- Include header -->
<?php include('public/includes/header.php'); ?>

<!-- Include sidebar -->
<?php include('sm_sidebar.php'); ?>

<!-- Main content container -->
<div class="container">
    <h1>Train Status Update</h1>
      <div class="row">
          <label for="arrival_time">Arrival Time:</label>
          <input type="text" id="arrival_time" name="arrival_time" value="<?= $train_times['arrival_time'] ?>" readonly>
      </div>
      <div class="row">
          <label for="departure_time">Departure Time:</label>
          <input type="text" id="departure_time" name="departure_time" value="<?= $train_times['departure_time'] ?>" readonly>
      </div>
      <div class="row">
        <form action="/SlRail/traindelay/update" method="post">

          <input type="hidden" id="schedule_id" name="schedule_id" value="<?= $train_times['schedule_id'] ?>">

          <input type="hidden" id="sm_id" name="sm_id" value="<?= $employee_id ?>">

          <input type="hidden" id="station_name" name="station_name" value="<?= $train_times['station_name'] ?>">


          <label for="status">Status:</label>
          <select id="status" name="status">
              <option value="Arrived">Arrived</option>
              <option value="OnTime">On Time</option>
              <option value="Delayed">Delayed</option>
          </select>

          <button id="update_btn" >Update Status</button>
        </form>

      </div>
</div>

<!-- Include footer -->
<?php include('public/includes/footer.php'); ?>

<!-- Include any JavaScript files or scripts here -->
<script>
    function updateStatus() {
        // Get the selected status
        var status = document.getElementById("status").value;

        // Perform AJAX request to update the status
        // You would implement the AJAX request using JavaScript or a JavaScript framework like jQuery
        // Example AJAX request:
        /*
        $.ajax({
            url: '/update_status.php',
            type: 'POST',
            data: { status: status },
            success: function(response) {
                // Handle success
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
            }
        });
        */
    }
</script>

</body>
</html>
