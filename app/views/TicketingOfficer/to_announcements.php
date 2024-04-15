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
            background-color: #0062cc;
        }

        
    </style>

</head>
<body>

    <?php include('public/includes/header.php'); ?>

    <div class="sidebar">
    <?php include('to_sidebar.php'); ?>
    </div>

<div class="title1">
    <h1><center>Announcements</center></h1></div>
    <table class="ann-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($announcements as $ann): ?>
                <tr>
                    <td><?= $ann['ann_id'] ?></td>
                    <td><?= $ann['title'] ?></td>
                    <td><?= $ann['description'] ?></td>
                
                
             </tr>
            <?php endforeach; ?>
        </tbody>
    </table>  
    
    
<?php include('public/includes/footer.php'); ?>
</body>
</html>