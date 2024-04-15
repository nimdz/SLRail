<!-- allstations.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SlRail/public/css/sidebar.css">
    <title>All Stations</title>
    <style>
        table {
            width: 900px;
            border-collapse: collapse;
            overflow-y: auto;
            margin-left: 300px;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<?php include('public/includes/header.php'); ?>

<?php include('ad_sidebar.php'); ?>
    <h2 style="margin-left: 500px; font-family: 'Courier New', Courier, monospace;">Stations for Line: <?php echo getLineName($_POST["lineId"]); ?></h2>
    <table>
        <thead>
            <tr>
                <th>Station Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stations as $station): ?>
            <tr>
                <td><?php echo $station['station_name']; ?></td>
                <td>
                    <button class="button" onclick="toggleUpdateForm(<?php echo $station['station_id']; ?>)">Update</button>
                    <form id="updateForm_<?php echo $station['station_id']; ?>" action="/SlRail/station/updateStation" method="post" style="display: none;">
                        <input type="hidden" name="station_id" value="<?php echo $station['station_id']; ?>">
                        <label for="station_name">Station Name:</label>
                        <input type="text" name="station_name" value="<?php echo $station['station_name']; ?>">
                        <label for="lineId">Select Line:</label>
                        <select id="lineId" name="lineId" required>
                            <option value="" disabled>Select line No</option>
                            <option value="1" <?php if($station['lineID'] == 1) echo "selected"; ?>>Coast Line</option>
                            <option value="2" <?php if($station['lineID'] == 2) echo "selected"; ?>>Main Line</option>
                            <option value="3" <?php if($station['lineID'] == 3) echo "selected"; ?>>Matale Line</option>
                        </select>
                        <button class="button" type="submit">Update </button>
                    </form>

                    <form action="/SlRail/station/deleteStation" method="post">
                        <input type="hidden" name="station_id" value="<?php echo $station['station_id']; ?>">
                        <button class="button" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
    // Define the getLineName function
    function getLineName($lineId) {
        switch ($lineId) {
            case 1:
                return "Coast Line";
            case 2:
                return "Main Line";
            case 3:
                return "Matale Line";
            default:
                return "Unknown Line";
        }
    }
    ?>

<?php include('public/includes/footer.php'); ?>

<script>
    function toggleUpdateForm(stationId) {
        var form = document.getElementById('updateForm_' + stationId);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>

</body>
</html>
