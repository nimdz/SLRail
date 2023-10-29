<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Dashboard</title>
    <link rel="stylesheet" href="/SlRail/public/css/dashboard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
      <div class="horizontal">
        <a href="#"><img width="100px" src="/SlRail/public/assets/logo.jpg"> </a>
            <a href="#">
                <span class="material-icons">
                  home
                </span>
                Home</a>
            <a href="#">
                <span class="material-symbols-outlined">
                    schedule
                </span>
                Train Schedule</a>
            <a href="#">
                <span class="material-symbols-outlined">
                    location_on
                </span>
                Track Location</a>
        </div>
    
    <div class="sidebar">

        <a href="#">
            <span class="material-icons">
            account_circle
            </span>
            Profile
         </a>
            <a href="/SlRail/views/booking_form.php">
                <span class="material-symbols-outlined">
                    new_label
                </span>
                Book a Trip
            </a>
              
           
            <a href="#">
                <span class="material-symbols-outlined">
                    your_trips
                </span>
                    My Trips
                
            </a>     
            
           <a href="/SlRail/passenger/logout">
                <span class="material-icons">
                    logout
                </span>
                Logout
           <a>
             
      
    </div>
       

    <header>
    <?php
        // Start a session to access session variables
        session_start();

        // Check if the user_data session variable exists and contains the username and user ID
        if (isset($_SESSION['user_id']) && isset($_SESSION['username']) ) {
            $username = $_SESSION['username'];
            $user_id = $_SESSION['user_id'];
            echo '<h1>Welcome, Your Name: ' . $username . '</h1>';
            echo '<h2>Your ID: ' . $user_id . '</h2>';
        } else {
            // Handle the case where the user is not logged in
            echo '<h1>Welcome</h1>';
        }
        ?>
 
    </header>
    
</body>
</html>