<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .topnav-search{
            position: relative;
            display: inline-block;
        }

        .material-symbols-outlined {
            position: relative;
        }

        .material-symbols-outlined input {
            padding-right: 30px; /* Adjust as needed */
            border: 1px solid #ccc; /* Add border style */
            border-radius: 50px; /* Add border radius */
        }

        .material-symbols-outlined::before {
            content: "\1F50D"; /* Unicode for magnifying glass icon */
            font-size: 20px;
            position: absolute;
            right: 10px; /* Adjust as needed */
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>

<div class="topnav-search">
    <span class="material-symbols-outlined">
        <input type="text" placeholder="Search..">
    </span>
    <img src="/SlRail/public/assets/profile.jpg" style="width:50px; border-radius: 50px;">
    <p><?= $profile['full_name'] ?></p>
</div>

</body>
</html>
