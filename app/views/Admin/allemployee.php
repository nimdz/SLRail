<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Employees</title>
    <link rel="stylesheet" href="/SlRail/public/css/table.css">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <style>
        .employee-table {
        width: 80%;
        margin: 20px auto; /* Center the table */
        margin-left: 230px; /* Add left margin to the table */
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
        th{
           width:600px;
        }
</style>
</head>
<body>
<?php include('public/includes/header.php'); ?>


  <?php include('ad_sidebar.php'); ?>


    <h1><center>All Employees</center></h1>
    <table class="employee-table">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Username</th>
                <th>NIC</th>
                <th>Email</th>
                <th>Position</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?= $employee['full_name'] ?></td>
                    <td><?= $employee['username'] ?></td>
                    <td><?=$employee['nic'] ?></td>
                    <td><?= $employee['email'] ?></td>
                    <td><?= getPositionName($employee['position']) ?></td>
                    <td>
                        <button onclick="updateEmployee(<?= $employee['employee_id'] ?>)">Update</button>
                        <button onclick="deleteEmployee(<?= $employee['employee_id'] ?>)">Delete</button>
                    </td>
                </tr>



                <!-- Update Booking Form -->
                <tr id="updateForm<?= $employee['employee_id'] ?>" style="display: none;">
                    <td colspan="5">
                        <form method="POST" action="/SlRail/employee/update">
                            <input type="hidden" name="employee_id" value="<?= $employee['employee_id'] ?>">
                            <input type="text" name="full_name" placeholder="Enter Updated Name ">
                            <input type="text" name="nic" placeholder="Enter New Nic">
                            <input type="text" name="position" placeholder="Enter Updated Position">
                            <input type="text" name="username" placeholder="Enter Updated Username">
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
        function updateEmployee(employeeId) {
            var form = document.getElementById("updateForm" + employeeId);
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }

        function deleteEmployee(employeeId) {
            if (confirm("Are you sure you want to delete this employee?")) {
                // Redirect to the delete URL (you need to define this in your router)
                window.location.href = "/SlRail/employee/deleteEmployee?employee_id=" + employeeId;
            }
        }
    </script>
        <?php include('public/includes/footer.php'); ?>

        <?php
    function getPositionName($positionCode)
    {
        switch ($positionCode) {
            case 1:
                return 'Station Master';
            case 2:
                return 'Train Driver';
            case 3:
                return 'Ticketing Officer';
            default:
                return 'Unknown';
        }
    }
    ?>

</body>
</html>