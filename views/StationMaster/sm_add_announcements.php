<?php
// Set the active link based on the current page
$activeLink = 'a_add'; // Change this value according to the current page
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

            document.getElementById('updatePro').addEventListener("submit", function(event) {
                event.preventDefault(); // Prevents the default form submission
                window.location.href = "home.php"; // Redirects to home.php
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