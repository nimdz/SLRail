<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Employee</title>
        <link rel="stylesheet" href="/SlRail/public/css/employee_register.css">
        <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
 <style>
  .container1{
    margin-top: 5px;
   margin-left: 300px;
   width:1000px;
   background-color: white;
   border: 1px solid black;
   border-radius: 50px;
  }
</style>
</head>
<body>

<?php include('public/includes/header.php'); ?>

<?php include('ad_sidebar.php'); ?>

 <div class="container1">

        <h1>Employee Registration</h1>
        <form action="/SlRail/employee/add" method="post">
            <label for="full_name">Full Name:</label>
            <input type="text" id="name" name="full_name" required placeholder="Enter the Full_name">

            <label for="nic">NIC:</label>
            <input type="text" id="nic" name="nic" required placeholder="Enter the NIC ">

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="position">Position:</label>
            <select id="role" name="position" required>
                <option value="1">Station Master</option>
                <option value="2">Train Driver</option>
                <option value="3">Ticketing Officer</option>
            </select>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Add Employee</button>
        </form>
    </div>

<?php include('public/includes/footer.php'); ?>

</body>
</html>