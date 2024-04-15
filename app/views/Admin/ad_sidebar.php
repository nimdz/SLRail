<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/SlRail/public/css/p_dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        .submenu {
            display: none;
        }
        .sidebar {
            height: 100%;
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: white;
            padding-top: 20px;
            transition: 0.5s;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: black;
            display: block;
            transition: 0.3s;
        }

        /* Sidebar links on hover */
        .sidebar a:hover {
            background-color: #444;
        }

        /* Active link */
        .sidebar a.active {
            background-color: #007bff;
            color: #fff;
        }
        /* Submenu */
        .submenu {
            display: none;
            padding-left: 20px;
        }

        /* Submenu links */
        .submenu a {
            padding: 8px 0;
            text-decoration: none;
            font-size: 16px;
            color: black;
            display: block;
            transition: 0.3s;
        }

        /* Submenu links on hover */
        .submenu a:hover {
            color: #fff;
        }
        .material-symbols-outlined {
          background-color: white;
        }
        .material-icons{
         background-color: white;
        }

    </style>
</head>
<body>

<div class="sidebar">
    <a href="#"><img width="100px" src="/SlRail/public/assets/logo.jpg"> </a>

    <a href="/SlRail/admin/dashboard">
        <span class="material-symbols-outlined">
            dashboard
        </span>
        Dashboard
    </a>  


    <a href="#" onclick="toggleSubMenu('employeesSubMenu')">
        <span class="material-symbols-outlined">
        person_apron
        </span>
         Employees
      </a>

    <div class="submenu" id="employeesSubMenu">
        <a href="/SlRail/employee/add">Add Employee</a>
        <a href="/SlRail/employee/allemployees">View Employees</a>
    </div>


    <a href="#" onclick="toggleSubMenu('passengerSubMenu')">
        <span class="material-icons">
          person
        </span>
         Passengers
      </a>

    <div class="submenu" id="passengerSubMenu">
        <a href="/SlRail/admin/allPassengers">View Passengers</a>
    </div>
    
<!-- 
    <a href="#">
        <span class="material-symbols-outlined">
            location_on
        </span>
        Track Location
    </a> -->

    <a href="#" onclick="toggleSubMenu('schedulesSubMenu')">
        <span class="material-symbols-outlined">
        calendar_month
        </span>
        Schedules
    </a>

    <div class="submenu" id="schedulesSubMenu">
        <a href="/SlRail/trainschedule/loadForm">Add Schedule</a>
        <a href="/SlRail/trainschedule/adviewSchedules">View Schedule</a>
    </div>

    <a href="#"  onclick="toggleSubMenu('trainSubMenu')">
        <span class="material-icons">
            train
        </span>
        Trains
    </a>
    <div class="submenu" id="trainSubMenu">
        <a href="/SlRail/train/addTrain">Add Train</a>
        <a href="/SlRail/train/adView">View Trains</a>
        <a href="/SlRail/admin/assign_td">Assign Train Drivers</a>
    </div>
    

    <a href="#"  onclick="toggleSubMenu('stationsSubMenu')">
        <span class="material-symbols-outlined">
        add_location
        </span>
        Stations
    </a>
    <div class="submenu" id="stationsSubMenu">
        <a href="/SlRail/station/addStation">Add Station</a>
        <a href="/SlRail/station/searchStations">View Stations</a>
        <a href="/SlRail/admin/assign_sm">Assign Station Master</a>
    </div>

    <a href="#" onclick="toggleSubMenu('stoppingsSubMenu')">
        <span class="material-icons">
            location_searching
        </span>
        Stoppings
    </a>
    <div class="submenu" id="stoppingsSubMenu">
        <a href="/SlRail/stopping/addStopping">Add Stoppings</a>
        <a href="/SlRail/stopping/selectSchedule">View Stoppings</a>
    </div>

    <a href="#">
        <span class="material-icons">
            account_circle
        </span>
        Profile
    </a>

    <a href="/SlRail/admin/logout">
        <span class="material-icons">
            logout
        </span>
        Logout
    </a>       
</div>

<script>
    function toggleSubMenu(subMenuId) {
        var subMenu = document.getElementById(subMenuId);
        if (subMenu.style.display === "block") {
            subMenu.style.display = "none";
        } else {
            subMenu.style.display = "block";
        }
    }
</script>

</body>
</html>
