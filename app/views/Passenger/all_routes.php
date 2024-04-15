<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
<link rel="stylesheet" href="/SlRail/public/css/Passenger/allroutes.css">

<title>Train Lines</title>
</head>
<body>

<?php include('public/includes/header.php'); ?>


<?php include('passenger_sidebar.php'); ?>

<h3 style="margin-left:300px; margin-top:30px; font-family:'Courier New', Courier, monospace; font-size:32px; "><center>Please Select  Your TrainLine of Destination</center></h3>

<div class="container">
    
    <div class="card train-card">
        <h2>Coastal Line</h2>
        <p> Aluthgama | Galle | Matara | Beliatta</p>
        <a href="/SlRail/trainschedule/getTrains_route?route=coast_line"style="display: block; margin-left: 400px; background-color:red; border-radius:50px; width:140px; height:40px; color:white;  text-align: center; line-height: 40px;">
            Check Trains</a>
    </div>

        <div class="card train-card">
            <h2>Main Line</h2>
            <p>Kandy | Hatton | Nanu Oya | Ella | Badulla</p>
            <a href="nextpage.html" style="display: block; margin-left: 400px; background-color:red; border-radius:50px; width:140px; height:40px; color:white;  text-align: center; line-height: 40px;">
            Check Trains</a>
        </div>

    <div class="card train-card">
        <h2>Northern Line</h2>
        <p> Kurunegala | Maho | Anuradhapura | Medawachchiya | Vavuniya | Jaffna | Kankasanthurai | Thalaimannar Pier</p>
        <a href="nextpage.html" style="display: block; margin-left: 400px; background-color:red; border-radius:50px; width:140px; height:40px; color:white;  text-align: center; line-height: 40px;">
            Check Trains</a>    
    </div>
    <div class="card train-card">
        <h2>Eastern Line</h2>
        <p> Polonnaruwa | Batticaloa | Trincomalee</p>
        <a href="nextpage.html" style="display: block; margin-left: 400px; background-color:red; border-radius:50px; width:140px; height:40px; color:white;  text-align: center; line-height: 40px;">
            Check Trains</a>    
    </div>

    <div class="card train-card">
        <h2>Kelani Valley Line</h2>
        <p> Waga | Avissawella</p>
        <a href="nextpage.html" style="display: block; margin-left: 400px; background-color:red; border-radius:50px; width:140px; height:40px; color:white;  text-align: center; line-height: 40px;">
            Check Trains</a>
    </div>
</div>

<?php include('public/includes/footer.php'); ?>



</body>
</html>
