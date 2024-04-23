 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.image-container {
    flex: 1;
    height: 100%;
    overflow: hidden;
}

.login-container {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
}

.image-icon {
    width: 100%;
    height: auto;
    object-fit: cover;
    height:700px;
}

.register {
    background-color: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

form {
    text-align: center;
}

input[type="text"],
input[type="password"],
input[type="email"] {
    padding: 10px;
    border-radius: 20px;
    border: 1px solid #ccc;
    width: 250px;
    margin-bottom: 20px;
}

.button {
    width: 200px;
    border: none;
    border-radius: 20px;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-left: 100px;
}

.button:hover {
    background-color: #0056b3;
}

.links {
    margin-top: 20px;
    text-align: center;
}

.links p {
    margin: 10px 0;
}

.links a {
    color: #007bff;
    text-decoration: none;
}

.links a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
    <div class="container">
        <div class="image-container">
            <img class="image-icon" src="/SlRail/public/assets/img2.jpg" alt="Railway Image">
        </div>
        <div class="login-container">
            <div class="register">
                <h2>Sign Up</h2>
                <form action="/SlRail/home/login" method="post">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="user" required><br>

                    <label for="full_name">Full Name:</label>
                    <input type="text" name="full_name" required><br>

                    <label for="email">Email  :   </label>
                    <input type="email" name="email" required><br>


                    <label for="password">Password:</label>
                    <input type="password" name="password" class="pass" required><br>

                    <button class="button" type="submit">Register</button>
                </form>
                <div class="links">
                <p>Already have an account? <a href="/SlRail/home/login">Login here</a></p>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
