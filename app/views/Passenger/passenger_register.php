<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Passenger Registration</title>
    <link rel="stylesheet" href="/SlRail/public/css/styles.css">
</head>
<body>
    <div class="container">
        <div class="register">
            <h2>SignUp</h2>
            <form action="/SlRail/passenger/register" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" style="margin-left:150px;"required><br>

                <label for="full_name">Full Name:</label>
                <input type="text" name="full_name" style="margin-left:150px;"required><br>

                <label for="email">Email:</label>
                <input type="email" name="email" style="margin-left:150px;"required><br>

                <label for="password">Password:</label>
                <input type="password" name="password"  style="margin-left:150px;"required><br>

                <button class="button" type="submit">Register</button>
            </form>
        <div class="links">
            <p>Already have an account? <a href="/SlRail/home/login">Login here</a></p>
          </div>
      </div>
      <img class="image-icon" src="/SlRail/public/assets/img2.jpg"  />
    </div>
</body>
</html>