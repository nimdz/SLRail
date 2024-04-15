<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Passengers</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <style>
        .passenger-table {
        width: 80%;
        margin: 20px auto; /* Center the table */
        margin-left: 250px; /* Add left margin to the table */
        border-collapse: collapse;
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 50px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button + button {
            margin-top: 10px;
        }
        h1 {
      margin-left: 250px; /* Remove default margin */
      text-align: center;
    }
    th{
       width:650px;
    }

</style>
</head>
<body>
<?php include('public/includes/header.php'); ?>

<?php include('ad_sidebar.php'); ?>

<h1><center>All Passengers</center></h1>
<table class="passenger-table">
    <thead>
    <tr>
        <th>Full Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($passengers as $passenger): ?>
        <tr>
            <td><?= $passenger['full_name'] ?></td>
            <td><?= $passenger['username'] ?></td>
            <td><?= $passenger['email'] ?></td>
            <td>
                <button onclick="updatePassenger(<?= $passenger['id'] ?>)">Update</button>
                <button onclick="deletePassenger(<?= $passenger['id'] ?>)">Delete</button>
            </td>
        </tr>

        <!-- Update Passenger Form -->
        <tr id="updateForm<?= $passenger['id'] ?>" style="display: none;">
            <td colspan="3">
                <form method="POST" action="/SlRail/passenger/update">
                    <input type="hidden" name="passenger_id" value="<?= $passenger['id'] ?>">
                    <input type="text" name="full_name" placeholder="Enter Updated Name">
                    <input type="text" name="username" placeholder="Enter Updated Username">
                    <input type="text" name="email" placeholder="Enter Updated Email">
                    <button type="submit">Save</button>
                </form>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
</table>
<p style="text-align: center; padding-top:100px; padding-bottom: 200px; font-size: 14px;">
    <a href="/SlRail/admin/dashboard">Go to Dashboard</a>
</p>

<script>
    // JavaScript function to toggle visibility of update forms
    function updatePassenger(passengerId) {
        var form = document.getElementById("updateForm" + passengerId);
        if (form.style.display === "none") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }

    function deletePassenger(passengerId) {
        if (confirm("Are you sure you want to delete this passenger?")) {
            // Redirect to the delete URL (you need to define this in your router)
            window.location.href = "/SlRail/passenger/deletePassenger?passenger_id=" + passengerId;
        }
    }
</script>

<?php include('public/includes/footer.php'); ?>

</body>
</html>
