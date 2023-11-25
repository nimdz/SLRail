<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SL Rail</title>
    <link rel="stylesheet" href="/SlRail/public/css/styles.css">
    <link rel="stylesheet" href="/SlRail/public/css/media-queries.css">

    <!-- Cancel & Update btns -->
    <script>
        window.addEventListener('load', (event) => {
            document.getElementById('cancelButton').addEventListener('click', function() {
                window.location.href = 'home.php';
            });

            document.getElementById('updatePro').addEventListener("submit", function(event) {
                event.preventDefault(); // Prevents the default form submission
                window.location.href = "home.php"; // Redirects to home.php
            });
        });
    </script>
</head>
<body>
       

    <div class="sidebar">
        <a href="sm_dashboard.php" class="company-logo">
            <img src="./assets/logo.jpg" alt="company logo">
        </a>
        <a href="sm_dashboard.php" class="hover-link">Dashboard</a>
        <div class="dropdown">
            <a href="#" class="hover-link">Profile <span class="dropdown-indicator">&#9662;</span></a>
            <div class="dropdown-menu">
                <a href="sm_profile_view.php" class="hover-link">View</a>
                <a href="sm_profile_update.php" class="hover-link">Update</a>
                <a href="sm_profile_changePwd.php" class="hover-link">Change Password</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#" class="hover-link active">Announcements <span class="dropdown-indicator">&#9662;</span></a>
            <div class="dropdown-menu">
                <a href="sm_add_announcements.php" class="hover-link active">Add Announcement</a>
                <a href="sm_manage_announcements.php" class="hover-link">Manage Announcements</a>
            </div>
        </div>
        <a href="sm_manage_trains.php" class="hover-link">Arrivals & Departures</a>
        <div class="dropdown">
            <a href="#" class="hover-link">Schedules <span class="dropdown-indicator">&#9662;</span></a>
            <div class="dropdown-menu">
                <a href="sm_add_schedules.php" class="hover-link">Add Schedule</a>
                <a href="sm_manage_schedules.php" class="hover-link">Manage Schedules</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#" class="hover-link">Messages <span class="dropdown-indicator">&#9662;</span></a>
            <div class="dropdown-menu">
                <a href="sm_send_messages.php" class="hover-link">Send Message</a>
                <a href="sm_received_message.php" class="hover-link">Received Messages</a>
            </div>
        </div>
        <a href="sm_view_live_location.php" class="hover-link">Live Location</a>
        <a href="sm_feedbacks.php" class="hover-link">Feedbacks</a>
        <a href="home.php" class="hover-link">Log Out</a>
    </div>
    
    <?php include('includes/header.php'); ?>
    
    <!-- Page content -->
    
    <section class="features-section">
        <div class="container">    
            <h3>Add New Announcement</h3>
        </div>
        <div class="container">
            <div class="container">
                <form action="action_page.php">
                  <div class="row">
                    <div class="col-25">
                      <label for="titl">Title</label>
                    </div>
                    <div class="col-75">
                      <input type="text" id="titl" name="title">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-25">
                      <label for="desc">Description</label>
                    </div>
                    <div class="col-75">
                      <textarea id="desc" name="subject" placeholder="Write something.." style="height:200px"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div>
                        <input type="submit" value="Add Passenger" class="update-btn", id="updatePro">
                        <button type="button" id="cancelButton" class="cancel-btn">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
        </div>        
    </section>
    </div>

    <!-- subfooter -->
<?php include('includes/footer.php'); ?>
    
</body>

</html>