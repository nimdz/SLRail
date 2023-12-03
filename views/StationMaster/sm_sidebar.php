<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="/SlRail/public/css/dashboard.css">
<link rel="stylesheet" href="/SlRail/public/css/styles.css">
    <link rel="stylesheet" href="/SlRail/public/css/media-queries.css">
    <link rel="stylesheet" href="/SlRail/public/css/form.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
</head>
<body>
<div class="sidebar">
        <a href="sm_dashboard.php" class="company-logo">
            <img src="/SlRail/public/assets/logo.jpg" alt="company logo">
        </a>
        <a href="/SlRail/stationmaster/dashboard" class="hover-link <?php echo ($activeLink == 'dashboard') ? 'active' : ''; ?>">Dashboard</a>
        <div class="dropdown">
            <a href="#" class="hover-link">Profile <span class="dropdown-indicator">&#9662;</span></a>
            <div class="dropdown-menu">
                <a href="sm_profile_view.php" class="hover-link <?php echo ($activeLink == 'p_view') ? 'active' : ''; ?>">View</a>
                <a href="sm_profile_update.php" class="hover-link <?php echo ($activeLink == 'p_update') ? 'active' : ''; ?>">Update</a>
                <a href="sm_profile_changePwd.php" class="hover-link <?php echo ($activeLink == 'p_changePwd') ? 'active' : ''; ?>">Change Password</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#" class="hover-link">Announcements <span class="dropdown-indicator">&#9662;</span></a>
            <div class="dropdown-menu">
                <a href="/SlRail/views/StationMaster/sm_add_announcements.php" class="hover-link <?php echo ($activeLink == 'a_add') ? 'active' : ''; ?>">Add Announcement</a>
                
                <a href="sm_manage_announcements.php" class="hover-link <?php echo ($activeLink == 'a_manage') ? 'active' : ''; ?>">Manage Announcements</a>
            </div>
        </div>
        <a href="sm_manage_trains.php" class="hover-link <?php echo ($activeLink == 'arrivals&departures') ? 'active' : ''; ?>">Arrivals & Departures</a>
        <div class="dropdown">
            <a href="#" class="hover-link">Schedules <span class="dropdown-indicator">&#9662;</span></a>
            <div class="dropdown-menu">
                <a href="sm_add_schedules.php" class="hover-link <?php echo ($activeLink == 's_add') ? 'active' : ''; ?>">Add Schedule</a>
                <a href="sm_manage_schedules.php" class="hover-link <?php echo ($activeLink == 's_manage') ? 'active' : ''; ?>">Manage Schedules</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#" class="hover-link">Messages <span class="dropdown-indicator">&#9662;</span></a>
            <div class="dropdown-menu">
                <a href="sm_send_messages.php" class="hover-link <?php echo ($activeLink == 'm_send') ? 'active' : ''; ?>">Send Message</a>
                <a href="sm_received_message.php" class="hover-link <?php echo ($activeLink == 'm_received') ? 'active' : ''; ?>">Received Messages</a>
            </div>
        </div>
        <a href="sm_view_live_location.php" class="hover-link <?php echo ($activeLink == 'location') ? 'active' : ''; ?>">Live Location</a>
        <a href="sm_feedbacks.php" class="hover-link <?php echo ($activeLink == 'feedbacks') ? 'active' : ''; ?>">Feedbacks</a>
        <a href="sm_login.php" class="hover-link">Log Out</a>
    </div>

</body>
</html>