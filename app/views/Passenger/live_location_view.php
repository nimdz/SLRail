<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Location</title>
    <link rel="stylesheet" type="text/css" href="/SlRail/public/css/styles_location.css">
    <link rel="stylesheet" type="text/css" href="/SlRail/public/css/sidebar.css">
</head>
<body>

 <?php include('public/includes/header.php'); ?>

  <?php include('passenger_sidebar.php'); ?>


        <div class="container" style="text-align: center; margin-left:250px; background-color:white;">    
            <h3>View Live Location</h3>
        </div>
            <div class="container" style="text-align: center; margin-left:250px;">
                <img src="/SlRail/public/assets/map.jpg" style="width: 1000px; height: auto; display: inline-block;">
            </div>
        </div>
        <div class="container" style="margin-left: 400px; margin-top: 80px; ">
            <div class="row">
                <form action="/SlRail/trainlocation/view" method="post">
                  <label for="uname">Train No:</label>
                  <input type="text" id="train_no" name="train_number" placeholder="      Enter Train No">
                  <button type="submit" class="btn1">Search</button>
              </div>
        </div>
   

    <?php include('public/includes/footer.php'); ?>

</body>
</html>
