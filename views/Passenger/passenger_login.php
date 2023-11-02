<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Passenger Login</title>
    <link rel="stylesheet" href="/SlRail/public/css/styles.css">
</head>
<body>
    <div class="container">
        <div class="register">
            <h2>Login</h2>
            <form action="/SlRail/passenger/login" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" required><br>

                <label for="password">Password:</label>
                <input type="password" name="password" required><br>

                <button class="button" type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="/SlRail/passenger/register">Register here</a></p>
      </div>
      <img class="image-icon" src="/SlRail/public/assets/img1.jpg"  />
    </div>
</body>
</html>