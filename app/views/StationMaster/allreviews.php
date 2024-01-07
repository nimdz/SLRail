<?php
// Set the active link based on the current page
$activeLink = 'reviews'; // Change this value according to the current page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Reviews</title>
    <link rel="stylesheet" href="/SlRail/public/css/StationMaster/reviews.css">
  
</head>
<body>
<?php include('public/includes/header.php'); ?>

<?php include('sm_sidebar.php'); ?>

<h1><center>Feedbacks</center></h1>
    <!-- Main Content -->
<div class="main-content">

    <!-- Loop through reviews and display each one-->
    <?php foreach ($reviews as $review): ?>
        <div class="review-card">
        <div class="heart-icon">&#10084;</div>
        <div class="full-name"><?php echo $review['full_name']; ?></div>
        <div class="email"><?php echo $review['email']; ?></div>
        <div class="line"></div>
        <div class="title"><?php echo $review['title']; ?></div>
        <div class="description"><?php echo $review['description']; ?></div>
        <div class="line"></div>
        <div class="date"><?php echo $review['created_at']; ?></div>
        </div>
    <?php endforeach; ?>
    
</div>
  
       <?php include('public/includes/footer.php'); ?>

</body>
</html>
