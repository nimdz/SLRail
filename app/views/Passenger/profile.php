<!-- driver_profile.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Passenger Profile</title>
  <link rel="stylesheet" href="/SlRail/public/css/profile.css">
  <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
</head>
<body>

  <?php include('public/includes/header.php'); ?>

  <?php include('passenger_sidebar.php'); ?>

  <script src="/SlRail/public/Js/profile.js" type="text/javascript"></script>


  <!-- Display profile details -->
  <div id="profileDetails">
    <h1>Profile</h1>
    <img class="profile"src="/SlRail/public/assets/profile.jpg" alt="Profile Image">
    <p class="info">Full Name: <?= $profile['full_name'] ?></p>
    <p class="info">UserName: <?= $profile['username'] ?></p>
    <p class="info">Email: <?= $profile['email'] ?></p>
    <button class="profileButton" onclick="showUpdateForm()"style="margin-left:300px; border-radius:50px; width:150px; height:35px; background-color:blue; font-size:16px; color:white; ">Edit Profile</button>
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

      <button class="updateButton" type="submit" style="margin-left:400px; ">Save Changes</button>
      <button class="cancelButton" type="button" onclick="hideUpdateForm()" style="margin-left:400px;">Cancel</button>
    </form>
  </div>

  <?php include('public/includes/footer.php'); ?>

</body>
</html>
