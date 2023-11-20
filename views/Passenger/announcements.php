<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
</head>
<body>

    <?php include('includes/header.php'); ?>

    <h1><center>Announcements</center></h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Titel</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($announcement as $ann): ?>
                <tr>
                    <td><?=$ann['ann_id'] ?></td>
                    <td><?=$ann['title'] ?></td>
                    <td><?=$ann['description'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p style="text-align: center; padding-top:100px; padding-bottom: 90px; font-size: 24px;">
        <a href="/SlRail/passenger/dashboard">Go to Dashboard</a>
    </p>
    
    <?php include('includes/footer.php'); ?>
    
</body>
</html>