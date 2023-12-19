<!-- driver_profile.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Passenger Profile</title>
  <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
  <link rel="stylesheet" href="/SlRail/public/css/profile.css">

  <style>
    .update-form input[type="text"] 
    {
      width: 200px;
      padding: 10px;
      margin-bottom: 20px;
      border: none;
      border-radius: 50px;
      background-color: #fff;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      margin-left: 400px;
    }
    .update-form{
      margin-top: 10px;
      border:2px solid black;
      border-radius: 50px;
      width:900px;
      height:660px;
      justify-content: center;
    }
    #profileDetails{
      margin-top: 10px;
      border:2px solid black;
      border-radius: 50px;
      width:900px;
      height:660px;
    }
  </style>
</head>
<body>

  <?php include('public/includes/header.php'); ?>

  <?php include('passenger_sidebar.php'); ?>

  <!-- Display profile details -->
  <div id="profileDetails">
    <h1>Profile</h1>
    <img class="profile"src="/SlRail/public/assets/profile.jpg" alt="Profile Image">
    <p class="info">Full Name: <?= $profile['full_name'] ?></p>
    <p class="info">UserName: <?= $profile['username'] ?></p>
    <p class="info">Email: <?= $profile['email'] ?></p>
    <button class="profileButton" onclick="showUpdateForm()"style="margin-left:300px; border-radius:50px; width:200px; height:30px; background-color:blue; font-size:24px; ">Edit Profile</button>
  </div>

  <!-- Option to update profile -->
  <div id="updateForm" class="update-form" style="margin-left:300px;">
    <h2 style="margin-left:300px;">Update Profile</h2>
    <form action="/SlRail/passenger/updateProfile" method="post">
      <label for="full_name" style="margin-left:300px;">Full Name:</label>
      <input type="text" id="full_name" name="full_name" value="<?= $profile['full_name'] ?>" required>

      <label for="email" style="margin-left:300px;">Email:</label>
      <input type="text"  id="email" name="email" value="<?= $profile['email'] ?>" required>
                  
      <label for="username" style="margin-left:300px;">Username:</label>
      <input type="text"  id="username" name="username" value="<?= $profile['username'] ?>" required>

      <button class="updateButton" type="submit" style="margin-left:400px; height:30px;">Save Changes</button>
      <button class="cancelButton" type="button" onclick="hideUpdateForm()" style="margin-left:400px;">Cancel</button>
    </form>
  </div>

  <?php include('public/includes/footer.php'); ?>
  <script>
    // Add this function to hide the update form when the page loads
    document.addEventListener('DOMContentLoaded', function () {
      hideUpdateForm();
    });

    function showUpdateForm() {
      document.getElementById('profileDetails').style.display = 'none';
      document.getElementById('updateForm').style.display = 'block';
    }

    function hideUpdateForm() {
      document.getElementById('updateForm').style.display = 'none';
      document.getElementById('profileDetails').style.display = 'block';
    }
  </script>
</body>
</html>
