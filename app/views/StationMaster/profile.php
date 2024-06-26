<?php
// Set the active link based on the current page
$activeLink = 'profile'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Station Master Profile</title>
  <!--<link rel="stylesheet" href="/SlRail/public/css/StationMaster/sidebar.css">-->
  <link rel="stylesheet" href="/SlRail/public/css/StationMaster/profile.css">
</head>
<body>


<?php include('public/includes/header.php'); ?>

<?php include('sm_sidebar.php'); ?>


    <!-- Display profile details -->
    <div id="profileDetails" class="card" style="margin-left:450px; margin-top:40px;">
        <h1>Profile</h1>
        <img class="profile"src="/SlRail/public/assets/profile1.png" alt="Profile Image" style="width:40%">
        <p class="info">Full Name: <?= $profile['full_name'] ?></p>
        <p class="info">UserName: <?= $profile['username'] ?></p>
        <p class="info">Email: <?= $profile['email'] ?></p>
        <p class="info">NIC: <?= $profile['nic'] ?></p>
        <button class="profileButton" onclick="showUpdateForm()">Edit Profile</button>
    </div>

    <!-- Option to update profile -->
    <div id="updateForm" class="update-form" >
       <h2><center>Update Profile</center></h2>
        <form action="/SlRail/stationmaster/updateProfile" method="post">
            <label for="full_name" style="margin-left:150px;">Full Name:</label>
            <input type="text" id="full_name" name="full_name" value="<?= $profile['full_name'] ?>" required>

            <label for="email" style="margin-left:150px;">Email:</label>
            <input type="text"  id="email" name="email" value="<?= $profile['email'] ?>" required>
            
            <label for="nic" style="margin-left:150px;">NIC:</label>
            <input type="text"  id="nic" name="nic" value="<?= $profile['nic'] ?>" required>

            <label for="username" style="margin-left:150px;">Username:</label>
            <input type="text"  id="username" name="username" value="<?= $profile['username'] ?>" required>

            <button class="updateButton" type="submit">Save Changes</button>
            <button class="cancelButton" type="button" onclick="hideUpdateForm()">Cancel</button>
        </form>
    </div>

<?php include('public/includes/footer.php'); ?>
<script>
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