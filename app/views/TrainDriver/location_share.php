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

  <?php include('td_sidebar.php'); ?>




        <div class="container" style="text-align: center; margin-top:20px;margin-left:250px;">    
            <h3>Live Location</h3>
        </div>
        <div class="container"style="text-align: center;  margin-left:250px;">
            <div class="container" style="text-align: center; margin-left:50px;">
            <img src="/SlRail/public/assets/map.jpg" style="width: 1000px; height: auto; display: inline-block;">
            </div>
            <input type="submit" value="Share" class="update-btn", id="updatePro">
        </div>
        <div class="container" style="margin-left: 250px; margin-top: 20px;">
            <div class="row">
                <div class="col-25">
                  <label for="uname">Train Number</label>
                </div>
                <div class="col-75">
                  <input type="text" id="uname" name="username" placeholder="">
                </div>
              </div>
            <div class="row">
                <div class="column">
                  <table class="zebra-table">
                    <tr>
                      <th>Source</th>
                      <th>Departure Time</th>
                    </tr>
                    <tr>
                       <td><input type="text" id="fieldName" name="fieldName"></td>
                       <td><input type="text" id="fieldName" name="fieldName"></td>
                    </tr>
                  </table>
                </div>
                <div>
                  <table class="zebra-table">
                    <tr>
                      <th>Destination</th>
                      <th>Arrival Time</th>
                    </tr>
                    <tr>
                        <td><input type="text" id="fieldName" name="fieldName"></td>
                        <td><input type="text" id="fieldName" name="fieldName"></td>
                    </tr>
                  </table>
                  <div>
                    <input type="submit" value="Start" class="update-btn", id="updatePro" style="text-align: center;">
                </div>
                </div>
              </div>
        </div>           
    </section>
    </div>
   

    <?php include('includes/footer.php'); ?>

</body>
</html>