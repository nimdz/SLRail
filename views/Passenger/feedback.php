<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
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

<?php include('includes/header.php'); ?>

<!-- Sidebar -->
<?php include('passenger_sidebar.php'); ?>


<!-- Main content -->
<div class="main-content">
    <!-- Header -->

    <div class="container">
        <form action="/SlRail/review/add" method="post">
            <h3>Your Feedback</h3>
            <div class="row">
                <div class="col-25">
                    <label for="full_name">Full Name:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="full_name" name="full_name"  required placeholder="Enter your full name">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="email">Email:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="email" name="email"required placeholder="Enter your email">
                </div>
            </div>
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
                    <input type="submit" value="Send" class="update-btn" id="updatePro">
                </div>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <?php include('includes/footer.php'); ?>
</div>

</body>
</html>
