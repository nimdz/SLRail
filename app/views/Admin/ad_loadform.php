<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Train Schedules</title>
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <link rel="stylesheet" href="/SlRail/public/css/Passenger/searchform.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
</head>
<body>

<?php include('public/includes/header.php'); ?>
<?php include('ad_sidebar.php'); ?>

<form action="/SlRail/booking/filter" method="get" style="margin-left:400px; ">

    <h1>Search dates</h1>

    <div class="form-row">
        <label for="startdate" style="margin-left: 50px; " >From:</label>
        
            <input type="date" id="Fromdate" name="start_date" required style="margin-top: 15px; margin-right:250px; ">
        

        <label for="todate" >To:</label>
        <input type="date" id="Todate" name="to_date" required style="margin-top: 15px; margin-right:250px;">
    </div>

    

    <button type="submit" class="btn1">Search</button>
</form>

<?php include('public/includes/footer.php'); ?>

</body>
</html>
