<?php
// Set the active link based on the current page
$activeLink = 'a_add'; // Change this value according to the current page
?>

<?php
// Set default values for $data
$data = array('title' => '', 'body' => '', 'title_err' => '', 'body_err' => '');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SL Rail</title>
    
    <link rel="stylesheet" href="/SlRail/public/css/form.css">

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
    
    <?php include('/includes/header.php'); ?>
    
    <div class="content">
    <section class="announcement-section">
        <div class="container">    
        <h3>Add New Announcement</h3>
        </div>
        <div class="container">
        
        <form action="/SlRail/controllers/StationMasterController/createAnnouncement" method="POST" class="announcement-form">
        <div class="row">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?php echo $data['title']; ?>">
            <span class="form-error"><?php echo $data['title_err']; ?></span>
        </div>
        <div class="row">
        <label for="description">Description</label>
        <textarea id="description" name="description" placeholder="Write something.." style="height:200px"><?php echo $data['body']; ?></textarea>
        <span class="form-error"><?php echo $data['body_err']; ?></span>
    </div>
    <div class="row">
        <div class="button-group">
            <input type="submit" value="Add Announcement" class="update-btn" id="updateBtn">
            <button type="button" id="cancelBtn" class="cancel-btn">Cancel</button>
        </div>
    </div>
</form>
        </div>        
    </section>
</div>


    <!-- subfooter -->
<?php include('includes/footer.php'); ?>
    
</body>

</html>