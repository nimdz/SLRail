<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Location</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
</head>
<body>
<?php include('public/includes/header.php'); ?>


<?php include('passenger_sidebar.php'); ?>

<script src="/SlRail/public/Js/booking.js" type="text/javascript"></script>

  <h1 style="margin-left:600px; margin-top:30px;"><center>Train Location</center></h1>
  <table class="location-table">
      <thead>
          <tr>
              <th><span class="material-symbols-outlined">train</span>Train ID</th>
              <th><span class="material-symbols-outlined">location_on</span>Current City</th>
              <th><span class="material-symbols-outlined">event</span>Last Updated</th>
           
          </tr>
      </thead>
      <tbody>
      <?php foreach ($trainLocation as $location): ?>
                <tr>
                    <td><?= $location['train_number'] ?></td>
                    <td><?= $location['current_city'] ?></td>
                    <td><?= $location['last_updated_time'] ?></td>
                </tr>
      <?php endforeach; ?>
    </table>

    <p style="text-align: center; padding-top:100px; padding-bottom: 200px; font-size: 14px;">
        <a href="/SlRail/passenger/dashboard">Go to Dashboard</a>
    </p>
  
    <?php include('public/includes/footer.php'); ?>


 

</body>
</html>