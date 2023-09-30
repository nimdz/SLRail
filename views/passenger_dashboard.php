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
    <nav>
        <ul>
            <li><a href="#">
                <span class="material-icons">
                    home
                    </span>
                    Home
                  </a>
            </li>
            <li><a href="#">
                <span class="material-symbols-outlined">
                    new_label
                </span>
                Book a Trip
              </a>
            </li>
            <li><a href="#">
                <span class="material-symbols-outlined">
                    your_trips
                </span>
                    My Trips
                  </a>
            </li>
            <li><a href="#">
                    <span class="material-icons">
                    account_circle
                    </span>
                    Profile
                    </a>
            </li>
            <li><a href="/SlRail/passenger/logout">
                <span class="material-icons">
                    logout
                </span>
                Logout
              </a>
        </li>

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