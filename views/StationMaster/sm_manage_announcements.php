<?php
// Set the active link based on the current page
$activeLink = 'a_manage'; // Change this value according to the current page
?>

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

            document.getElementById("updatePwd").addEventListener("submit", function(event) {
                event.preventDefault(); // Prevents the default form submission
                window.location.href = "home.php"; // Redirects to index.html
            });
        });
    </script>
</head>
<body>

    <?php include('sm_sidebar.php'); ?>
    
    <?php include('includes/header.php'); ?>
    
    <!-- Page content -->

    <div class="content">
        
        <section class="features-section">
            <div class="container">    
                <h3>Manage Announcements</h3>
            </div>
            <div class="container">
                <table class="zebra-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Train Delay Notice</td>
                            <td>Train #1005 (Blue Train) delayed by 30 minutes due to maintenance.</td>
                            <td style="text-align: center;">
                                <input type="submit" value="Update" class="update-btn", id="updatePwd", style="display: block; margin: 3px auto;">
                                <button type="button" id="cancelButton" class="cancel-btn" style="display: block; margin: 3px auto;">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Weather Advisory</td>
                            <td>Heavy rains expected in the western province. Possible disruptions in train services.</td>
                            <td style="text-align: center;">
                                <input type="submit" value="Update" class="update-btn", id="updatePwd", style="display: block; margin: 3px auto;">
                                <button type="button" id="cancelButton" class="cancel-btn" style="display: block; margin: 3px auto;">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Platform Change</td>
                            <td>Train #2022 (Queen of Jaffna) departing from Platform #4 instead of Platform #2.</td>
                            <td style="text-align: center;">
                                <input type="submit" value="Update" class="update-btn", id="updatePwd", style="display: block; margin: 3px auto;">
                                <button type="button" id="cancelButton" class="cancel-btn" style="display: block; margin: 3px auto;">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Track Maintenance</td>
                            <td>Track maintenance scheduled between Colombo and Kandy, expect minor delays on the route.</td>
                            <td style="text-align: center;">
                                <input type="submit" value="Update" class="update-btn", id="updatePwd", style="display: block; margin: 3px auto;">
                                <button type="button" id="cancelButton" class="cancel-btn" style="display: block; margin: 3px auto;">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Signal Failure</td>
                            <td>Signal failure at Ratmalana station affecting trains from south. Delay expected for 45 minutes.</td>
                            <td style="text-align: center;">
                                <input type="submit" value="Update" class="update-btn", id="updatePwd", style="display: block; margin: 3px auto;">
                                <button type="button" id="cancelButton" class="cancel-btn" style="display: block; margin: 3px auto;">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>        
        </section>
    </div>
    <!-- subfooter -->
<?php include('includes/footer.php'); ?>
</body>

</html>