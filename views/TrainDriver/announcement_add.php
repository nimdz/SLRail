<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Announcement Form</title>
    <link rel="stylesheet" href="/SlRail/public/css/style_form.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <style>
        .container{
            margin-top: 50px;
            width:1200px;
            height:auto;
        }
    <style>
</head>
<body>



<!-- header -->
<?php include('includes/header.php'); ?>

<?php include('td_sidebar.php'); ?>


<div class="container">
            <form action="/SlRail/announcement/tdaddAnnouncement" method="post">
            <h3>Your Announcement</h3>
                  <div class="row">
                    <div class="col-25">
                      <label for="title">Title:</label>
                    </div>
                    <div class="col-75">
                      <input type="text" id="title" name="title" required placeholder="Enter your title">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-25">
                      <label for="description">Description:</label>
                    </div>
                    <div class="col-75">
                      <textarea id="description" name="description" placeholder="Write something.." style="height:200px"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div>
                        <input type="submit" value="Send" class="update-btn", id="updatePro">
                    </div>
                  </div>              
                </form>
              </div>
        </div>        
    </div>

    <!-- footer -->
    <?php include('includes/footer.php'); ?>

    
</body>
</html>