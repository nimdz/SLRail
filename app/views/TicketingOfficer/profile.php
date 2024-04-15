<?php
// Set the active link based on the current page
$activeLink = 'profile'; // Change this value according to the current page
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ticketing Officer Profile</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="/SlRail/public/css/TicketingOfficer/profile.css">
  
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include('public/includes/header.php'); ?>
<?php include('to_sidebar.php'); ?>

<div class="container mt-5">
  <!-- Display profile details -->
  <div id="profileDetails" class="card">
    <h1 class="text-center">Profile</h1>
    <div class="text-center">
      <img class="profile img-fluid" src="/SlRail/public/assets/profile1.png" alt="Profile Image">
    </div>
    <div class="text-center">
      <p class="info"><strong>Full Name:</strong> <?= $profile['full_name'] ?></p>
      <p class="info"><strong>UserName:</strong> <?= $profile['username'] ?></p>
      <p class="info"><strong>Email:</strong> <?= $profile['email'] ?></p>
      <p class="info"><strong>NIC:</strong> <?= $profile['nic'] ?></p>
      <button class="profileButton btn btn-primary" onclick="showUpdateForm()">Edit Profile</button>
    </div>
  </div>

  <!-- Option to update profile -->
  <div id="updateForm" class="update-form card">
    <h2 class="text-center">Update Profile</h2>
    <form action="/SlRail/ticketingofficer/updateProfile" method="post">
      <div class="form-group">
        <label for="full_name">Full Name:</label>
        <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $profile['full_name'] ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $profile['email'] ?>" required>
      </div>
      <div class="form-group">
        <label for="nic">NIC:</label>
        <input type="text" class="form-control" id="nic" name="nic" value="<?= $profile['nic'] ?>" required>
      </div>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= $profile['username'] ?>" required>
      </div>
      <button class="updateButton btn btn-success" type="submit">Save Changes</button>
      <button class="cancelButton btn btn-secondary" type="button" onclick="hideUpdateForm()">Cancel</button>
    </form>
  </div>
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
