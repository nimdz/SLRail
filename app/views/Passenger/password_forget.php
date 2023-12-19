<!-- passenger_forgot_password.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Passenger Forgot Password</title>
    <link rel="stylesheet" href="/SlRail/public/css/styles.css">

<body>
</head>
<body>
 <div class="container">
    <div class="register">
     <h2>Forgot Password</h2>
     <form action="/SlRail/passenger/forgotPassword" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <!--  input field for the new password -->
        <label for="newPassword">New Password:</label>
        <input type="password" name="newPassword" required><br>

        <button class="button" type="submit">Reset Password</button>
      </form>
    </div>
    <img class="image-icon" src="/SlRail/public/assets/img2.jpg"  />
 </div>

</body>
</html>
