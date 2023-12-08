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

 <?php include('includes/header.php'); ?>

  <?php include('passenger_sidebar.php'); ?>




        <div class="container" style="text-align: center; margin-left:250px;">    
            <h3>View Live Location</h3>
        </div>
            <div class="container" style="text-align: center; margin-left:250px;">
                <img src="/SlRail/public/assets/map.jpg" style="width: 1000px; height: auto; display: inline-block;">
            </div>
        </div>
        <div class="container" style="margin-left: 250px; margin-top: 20px;">
            <div class="row">
                <div class="col-25">
                  <label for="uname">Train Name</label>
                </div>
                <div class="col-75">
                  <input type="text" id="uname" name="username" placeholder="1105">
                </div>
              </div>
              <div>
                <input type="submit" value="Search" class="update-btn", id="updatePro" style="text-align: center;">
              </div>
          </section>
   

    <?php include('includes/footer.php'); ?>

</body>
</html>
