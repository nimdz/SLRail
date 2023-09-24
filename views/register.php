<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Passenger Registration</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <div class="container">
        <div class="register">
            <h2>Passenger Registration</h2>
            <form action="/SlRail/passenger/register" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" required><br>

                <label for="password">Password:</label>
                <input type="password" name="password" required><br>

                <label for="full_name">Full Name:</label>
                <input type="text" name="full_name" required><br>

                <label for="email">Email:</label>
                <input type="email" name="email" required><br>

                <button class="button" type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="login.html">Login here</a></p>
      </div>
      <img class="image-icon" src="/public/assets/img2.jpg"  />
    </div>
</body>
</html>