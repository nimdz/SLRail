<!DOCTYPE html>
<html lang="en">
<head>
  <title>Station Master Profile</title>
  <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
  
  <style>
    .update-form{
       height:100px;
       width: 500px;
       margin-left:500px;
    }
    .profile {
    max-width: 30%;
    height: 200px;
    border-radius: 50%;
    margin-bottom: 20px;
    margin-left: 250px;
}


#profileDetails{
   margin-left: 300px;
 
}

h1 {
    color: #007BFF;
    margin-left: 300px;
}
h2{
    color: #007BFF;
   margin-left: 100px;

}
form {
    margin-top: 20px;
    display: grid;
    grid-gap: 15px;
}

label {
    font-weight: bold;
}
input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-top: 5px;
}

button {
    background-color: #28A745;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}
button:hover {
    background-color: #218838;
}
.profileButton{
 margin-left: 300px;
 border-radius: 150px;

}
.update-form {
    display: none;
    margin-left: 400px;
}
.updateButton {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-right: 10px; 
}

.updateButton:hover {
background-color: #0056b3;
}
.cancelButton {
background-color: #dc3545;
color: #fff;
padding: 10px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;
}

.cancelButton:hover {
background-color: #c82333;
}
 
 .updateButton,
 .cancelButton {
     margin-top: 10px; 
     width:300px;
     margin-left: 200px;
     border-radius: 50px; /* Add space between the buttons */
 }
 .info{
  margin-left: 300px;
  margin-bottom: 20px;
}
input{
  width:300px;
  border-radius: 50px;
  margin-left: 200px;
}
 

  </style>
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