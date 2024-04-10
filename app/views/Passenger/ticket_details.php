<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        #ticket-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h3 {
            font-family: 'Courier New', Courier, monospace;
            font-size: 32px;
            margin-bottom: 30px;
            text-align: center;
        }

        .logo {
            margin-bottom: 30px;
        }

        .booking-card {
            border: 1px solid #ccc;
            border-radius: 50px;
            padding: 20px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
            width: 100%;
            max-width: 700px;
            height:200px;
        }

        .booking-card > div {
            margin-bottom: 10px;
        }

        .material-icons {
            vertical-align: middle;
            margin-right: 10px;
        }

        #qr-code {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div id="ticket-container">
    <h3>Your Ticket</h3>
    <div class="logo">
    <img width="100px" src="/SLRail/public/assets/logo.jpg" alt="Logo">
    </div>

        <div class="booking-card">
              <div class="train_no" style="margin-left:20px;">     
                     <span class="departure-station" style="margin-left:200px; margin-top:50px;"><?= $bookingDetails['departure_station'] ?></span>
                    <span class="arrow"> ⇨</span>
                    <span class="destination-station"><?= $bookingDetails['destination_station'] ?></span>
                </div> 
            <div class="train-details">
                <span class="material-icons" style="font-size: 46px; margin-left:100px;">train</span>
                <?= $bookingDetails['train_number'] ?> - <?= $bookingDetails['train_type'] ?>                             
                <span class="destination-station" style="margin-left:300px;">No of Passengers: <?= $bookingDetails['number_of_passengers'] ?></span>
            </div>
            <div class="time" style="margin-left:200px; margin-top:10px;">
                            <?= date('h:i', strtotime($bookingDetails['departure_time'])) ?>
                            <?= date('A', strtotime($bookingDetails['departure_time'])) ?>
                            <?=" ● -------------------------------------------●" ?>
                            <?php
                                // Calculate duration
                                $departureTimestamp = strtotime($bookingDetails['departure_time']);
                                $arrivalTimestamp = strtotime($bookingDetails['arrival_time']);
                                $durationSeconds = $arrivalTimestamp - $departureTimestamp;

                                // Convert duration to hours and minutes
                                $durationHours = floor($durationSeconds / 3600);
                                $durationMinutes = floor(($durationSeconds % 3600) / 60);
                            ?>
                            <?= date('h:i', strtotime($bookingDetails['arrival_time'])) ?>
                            <?= date('A', strtotime($bookingDetails['arrival_time'])) ?>
                        </div>
                        <div class="stations1" style=" margin-left:200px;">
                            <?= $bookingDetails['departure_station'] ?>
                            <span class="duration"style="margin-left:110px;"><?=$durationHours?>h<?=$durationMinutes?>m
                            <span class="destination-station" style="margin-left:100px; "><?= $bookingDetails['destination_station'] ?></span>
                        </div> 
                        <div class="price" style=" margin-left:150px; margin-top: 40px; ">
                            <?="Selected Class: "?><?= $bookingDetails['seat_class']?>
                            <span class="ticket" style="margin-left:200px; "><?="Ticket Price: "?><?= $bookingDetails['ticket_price']?></span>
                        </div> 
        </div>

        <img src="data:image/png;base64,<?= base64_encode($qrCodeData) ?>" alt="QR Code">

         <!-- Button to trigger download -->
    <button id="downloadQrCodeBtn" style="width:250px; background-color:red; border-radius:50px; height:40px; color:white;">Download QR Code</button>

  
</div>
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to trigger download of QR code image
    function downloadQrCode() {
        // Get the QR code image data
        var qrCodeData = '<?= base64_encode($qrCodeData) ?>';

        // Create a Blob object from the base64-encoded image data
        var blob = b64toBlob(qrCodeData, 'image/png');

        // Create a URL for the Blob
        var url = URL.createObjectURL(blob);

        // Create a link element
        var a = document.createElement('a');
        a.href = url;
        a.download = 'qr_code.png'; // Set the desired filename

        // Simulate a click on the link element
        a.click();

        // Clean up
        URL.revokeObjectURL(url);
    }

    // Convert base64-encoded string to Blob object
    function b64toBlob(b64Data, contentType) {
        contentType = contentType || '';
        var sliceSize = 512;
        var byteCharacters = atob(b64Data);
        var byteArrays = [];

        for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
            var slice = byteCharacters.slice(offset, offset + sliceSize);
            var byteNumbers = new Array(slice.length);
            for (var i = 0; i < slice.length; i++) {
                byteNumbers[i] = slice.charCodeAt(i);
            }
            var byteArray = new Uint8Array(byteNumbers);
            byteArrays.push(byteArray);
        }

        var blob = new Blob(byteArrays, { type: contentType });
        return blob;
    }

    // Attach click event listener to the download button
    $('#downloadQrCodeBtn').on('click', function() {
        downloadQrCode();
    });
</script>


</body>
</html>
