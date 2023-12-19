<?php
// Set the active link based on the current page
$activeLink = 'announcements'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <style>
        .title1{
            margin-left: 300px;
            margin-top: 50px;
        }

        .ann-table {
            width: 70%;
            /*margin: 20px auto; /* Center the table */
            margin-left: 300px; /* Add left margin to the table */
            margin-right: 100px;
            border-collapse: collapse;
            margin-bottom: 5px;
        }
        a.button{
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
           

        }

        a.button:hover{
            background-color: #27672a;
        }

        
    </style>

</head>
<body>

    <?php include('public/includes/header.php'); ?>

    <div class="sidebar">
    <?php include('sm_sidebar.php'); ?>
    </div>

<div class="title1">
    <h1><center>Announcements</center></h1></div>
    <table class="ann-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($announcements as $ann): ?>
                <tr>
                    <td><?= $ann['ann_id'] ?></td>
                    <td><?= $ann['title'] ?></td>
                    <td><?= $ann['description'] ?></td>
                
                <td>
                        <!-- Add a condition to hide buttons when update form is visible -->
                        <?php if (!isset($_POST['ann_id']) || $_POST['ann_id'] !== $ann['ann_id']): ?>
                            <button class="update" onclick="updateAnnouncement(<?= $ann['ann_id'] ?>)">Update</button>
                            <button class="delete" onclick="deleteAnnouncement(<?= $ann['ann_id'] ?>)">Delete</button>
                        <?php endif; ?>
                    </td>
             </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Update Announcement Forms -->
<?php foreach ($announcements as $ann): ?>
    <div id="updateForm<?= $ann['ann_id'] ?>" style="display: none; width: calc(100% - 250px); padding-left: 300px;">
        <form method="post" action="/SlRail/announcement/updateAnnouncement" style="width: 100%;">
            <input type="hidden" name="ann_id" value="<?= $ann['ann_id'] ?>">
            <div style="display: flex; justify-content: space-between; width: 100%;">
                <input type="text" name="title" placeholder="New Title" style="flex: 1; margin-right: 20px;">
                <input type="text" name="description" placeholder="New Description" style="flex: 1; margin-right: 20px;">
                
            </div>
            <button type="submit" style="width: auto;">Save</button>
        </form>
    </div>
<?php endforeach; ?>
    <p style="text-align: center; padding-top:100px; padding-bottom: 90px; font-size: 16px;">
        <a class="button" href="/SlRail/announcement/addAnnouncement">Add Announcement</a>
    </p>
    
   
    
    <script>
    // JavaScript function to toggle visibility of update forms
    function updateAnnouncement(annId) {
        var form = document.getElementById("updateForm" + annId);
        if (form.style.display === "none") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }
    function deleteSchedule(annId) {
        if (confirm("Are you sure you want to delete this Announcement?")) {
            // Redirect to the delete URL (you need to define this in your router)
            window.location.href = "/SlRail/announcement/deleteSchedule?schedule_id=" + scheduleId;
        }
    }
</script>
<?php include('public/includes/footer.php'); ?>
</body>
</html>