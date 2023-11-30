<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/SlRail/public/css/dashboard.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>


<div class="sidebar">

<a href="#"><img width="100px" src="/SlRail/public/assets/logo.jpg"> </a>

    
      <a href="/SlRail/schedule/allschedules">
           <span class="material-symbols-outlined">
             bookmark
          </span>
            Manage Employees
          
      </a>     
      

     <a href="/SlRail/views/Admin/employee_register.php">
          <span class="material-symbols-outlined">
            calendar_month
          </span>
          Add Employee
      </a>

      <a href="#">
          <span class="material-symbols-outlined">
              location_on
          </span>
          Track Location
      </a>
  <a href="#">
      <span class="material-icons">
      account_circle
      </span>
      Profile
   </a>
   <a href="/SlRail/admin/logout">
          <span class="material-icons">
              logout
          </span>
          Logout
     <a>
             
      
    </div>
    <?php include('includes/header.php'); ?>


    <div class="content">
      <h1 > <center>Welcome Admin! </center></Welcome></h1>
      <p>"Welcome to the Admin Dashboard, your central control center for efficient system management.
As an Admin user, you hold a crucial role in overseeing and optimizing the entire railway operation.
From this dashboard, you wield the authority to manage user profiles, access detailed system analytics, and stay informed about critical notifications and updates.
You can also configure system parameters, track and report incidents, add and modify schedules, and ensure the overall health and performance of our railway network.
This comprehensive suite of tools equips you to maintain the highest standards of operational excellence and uphold the quality of service for all passengers.
Feel free to explore the menu on the left to access these powerful functionalities and streamline your administrative duties.
We're dedicated to ensuring that your role as an Admin user is as efficient and impactful as possible, contributing to a seamless railway experience for everyone involved."
      </p>
    </header>

    <?php include('includes/footer.php'); ?>

    
</body>
</html>
