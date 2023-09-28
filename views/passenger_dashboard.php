<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passenger Dashboard</title>
    <link rel="stylesheet" href="/SlRail/public/css/styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Book a Trip</a></li>
            <li><a href="#">My Trips</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Logout</a></li>

        </ul>
    </nav>
    <header>
    <?php
        // Start a session to access session variables
        session_start();

        // Check if the user_data session variable exists and contains the username
        if (isset($_SESSION['user_data']) && isset($_SESSION['user_data']['username'])) {
            $username = $_SESSION['user_data']['username'];
            echo '<h1>Welcome, ' . $username . '</h1>';
        } else {
            // Handle the case where the user is not logged in
            echo '<h1>Welcome</h1>';
        }
        ?>
 
    </header>
    
</body>
</html>