<!-- passenger_profile.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Passenger Profile</title>
  <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
  <link rel="stylesheet" href="/SlRail/public/css/profile.css">
  <script src="/SlRail/public/Js/profile.js"></script>
  
</head>
<body>


    <?php include('public/includes/header.php'); ?>

    <?php include('passenger_sidebar.php'); ?>


        <!-- Display profile details -->
        <div id="profileDetails">
            <h1>Profile</h1>
            <img class="profile"src="/SlRail/public/assets/profile.jpg" alt="Profile Image">
            <p class="info">Full Name: <?= $profile['full_name'] ?></p>
            <p class="info">Email: <?= $profile['email'] ?></p>
            <button class="profileButton" onclick="showUpdateForm()">Edit Profile</button>
        </div>

        <!-- Option to update profile -->
        <div id="updateForm" class="update-form" style=" margin-top:100px; width:700px; ">
           <h2 >Update Profile</h2>
            <form action="/SlRail/passenger/updateProfile" method="post">
                <label for="full_name" style="margin-left:150px;">Full Name:</label>
                <input type="text" id="full_name" name="full_name" value="<?= $profile['full_name'] ?>" style="border-radius:50px; margin-left:200px; width:200px;"required>

                <label for="email" style="margin-left:150px; ">Email:</label>
                <input type="email" id="email" name="email" value="<?= $profile['email']?>" style="border-radius:50px; margin-left:200px; width:200px;"required>

                <button class="updateButton" type="submit" style="border-radius:50px; margin-left:200px;  width:200px;">Save Changes</button>
                <button class="cancelButton" type="button" onclick="hideUpdateForm()" style="border-radius:50px; margin-left:200px;  width:200px;">Cancel</button>
            </form>
        </div>

    <?php include('public/includes/footer.php'); ?>
 
</body>
</html>
