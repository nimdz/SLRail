<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Location</title>
    <link rel="stylesheet" type="text/css" href="/SlRail/public/css/sidebar.css">
    <link rel="stylesheet" href="/SlRail/public/css/p_dashboard.css">
    <style>
      input, select {
        border-radius: 50px;
        width: 200px;
        height: 25px;
      }
      .update-btn {
         background-color: blue;
         margin-left: 250px;
         color: white;
         border-radius: 50px;
         width: 200px;
         height: 25px;
         margin-top: 30px;
      }
    </style>
</head>
<body>
    <?php include('public/includes/header.php'); ?>
    <?php include('td_sidebar.php'); ?>
    <div class="container" style="text-align: center; margin-top:20px; margin-left:250px;">    
        <h3>Live Location</h3>
    </div>
    <div class="container" style="text-align: center; margin-left:250px;">
        <div class="container" style="text-align: center; margin-left:50px;">
            <img src="/SlRail/public/assets/map.jpg" style="width: 1000px; height: auto; display: inline-block;">
        </div>
    </div>
    <div class="container" style="margin-left: 250px; margin-top: 40px;">
        <form id="myForm" method="post">
            <label for="train_no">Train Number:</label>
            <input type="text" id="train_no" name="train_number" placeholder="Enter Train No" required>
      
            <button type="button" onclick="promptForLocation()" class="update-btn" id="updatePro">Share Location</button>
        </form>
    </div>
    <?php include('public/includes/footer.php'); ?>
    <script>

        function promptForLocation() {
            // Prompt user for location sharing
            if (navigator.permissions) {
                navigator.permissions.query({name:'geolocation'}).then(function(result) {
                    if (result.state === 'granted' || result.state === 'prompt') {
                        shareLocation();
                    } else {
                        console.log('Geolocation permission denied.');
                    }
                });
            } else if (navigator.geolocation) {
                shareLocation();
            } else {
                console.log('Geolocation is not supported by this browser.');
            }
        }

        function shareLocation() {
            // Get selected train number
            var trainNumber = document.getElementById("train_no").value;

            // Get device's current location
            navigator.geolocation.getCurrentPosition(function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                // Send train number, latitude, and longitude to server
                fetch('/SlRail/trainlocation/shareLocation', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        trainNumber: trainNumber,
                        latitude: latitude,
                        longitude: longitude
                    })
                })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Display success/error message
                })
                .catch(error => {
                    console.error('Error sharing location:', error);
                });
            }, function(error) {
                console.error('Error getting current position:', error.message);
                // Handle error
                switch(error.code) {
                    case error.PERMISSION_DENIED:
                        console.log("User denied the request for Geolocation.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        console.log("Location information is unavailable.");
                        break;
                    case error.TIMEOUT:
                        console.log("The request to get user location timed out.");
                        break;
                    case error.UNKNOWN_ERROR:
                        console.log("An unknown error occurred.");
                        break;
                }
            });
        }
    </script>
</body>
</html>
