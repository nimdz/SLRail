<?php
// Set the active link based on the current page
$activeLink = 'addTrains'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Add Trains</title>
    <link rel="stylesheet" href="/SlRail/public/css/StationMaster/train_form.css">
    <link rel="stylesheet" href="/SlRail/public/css/StationMaster/sidebar.css">
    <style>
        .container{
            margin-top: 50px;
            width:1200px;
            height:auto;
        }
    </style>
</head>
<body>

<!-- header -->
<?php include('public/includes/header.php'); ?>

<?php include('sm_sidebar.php'); ?>

<div class="container">
<form action="/SlRail/train/addTrain" method="post">
        <h3>Add Trains</h3>
      <div class="form-row">
        <label for="trainNumber">Train Number:</label>
        <input type="int" id="trainNumber" name="trainNumber" required placeholder="">
      </div>

      <div class="form-row">
        <label for="trainType">Train Type:</label>
        <select id="train_type" name="train_type" required>
                <option value="" disabled selected>Select Train Type</option>
                    <option value="Express">Express</option>
                    <option value="Intercity">Intercity</option>
                    <option value="Slow">Slow</option>
                </select>
      </div>

      <div class="form-row">
        <label for="trainModel">Train Model:</label>
        <input type="text" id="trainModel" name="trainModel" required placeholder="">
      </div>

      <div class="form-row">
        <label for="trainDriverId">Train Driver ID:</label>
        <input type="int" id="trainDriverId" name="trainDriverId" required placeholder="">
      </div>

      <div class="form-row">
        <label>Number of Seats:</label>
        <div class="seat-inputs">
          <input type="number" id="firstClassSeats" name="firstClassSeats" placeholder="1st Class" required>
          <input type="number" id="secondClassSeats" name="secondClassSeats" placeholder="2nd Class" required>
          <input type="number" id="thirdClassSeats" name="thirdClassSeats" placeholder="3rd Class" required>
        </div>
      </div>

      <div class="form-row">
      <input type="submit" value="Send" class="update-btn" id="updatePro">
      <button type="button" value="Cancel" class="cancel-btn" id="cancel-btn"><a href="/SlRail/stationmaster/dashboard">Cancel</a></button>
      </div>
    </form>
  </div>

    <!-- footer -->
    <?php include('public/includes/footer.php'); ?>

    
</body>
</html>