
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Station Master Profile</title>
  <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
  <link rel="stylesheet" href="/SlRail/public/css/profile.css">
  <style>
    .update-form{
       height:100px;
       width: 500px;
       margin-left:500px;
    }
  </style>
</head>
<body>


    <?php include('includes/header.php'); ?>

    <?php include('sm_sidebar.php'); ?>


        <!-- Display profile details -->
        <div id="profileDetails">
            <h1>Profile</h1>
            <img class="profile"src="/SlRail/public/assets/profile.jpg" alt="Profile Image">
            <p>Full Name: <?= $profile['full_name'] ?></p>
            <p>UserName: <?= $profile['username'] ?></p>
            <p>Email: <?= $profile['email'] ?></p>
            <p>NIC: <?= $profile['nic'] ?></p>
            <button class="profileButton" onclick="showUpdateForm()">Edit Profile</button>
        </div>

        <!-- Option to update profile -->
        <div id="updateForm" class="update-form">
           <h2>Update Profile</h2>
            <form action="/SlRail/stationmaster/updateProfile" method="post">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" value="<?= $profile['full_name'] ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= $profile['email'] ?>" required>
                
                <label for="nic">NIC:</label>
                <input type="nic" id="nic" name="nic" value="<?= $profile['nic'] ?>" required>

                <label for="username">Username:</label>
                <input type="username" id="username" name="username" value="<?= $profile['username'] ?>" required>

                <button class="updateButton" type="submit">Save Changes</button>
                <button class="cancelButton" type="button" onclick="hideUpdateForm()">Cancel</button>
            </form>
        </div>

    <?php include('includes/footer.php'); ?>
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