<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Employee</title>
        <style>
        .container1 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: whitesmoke;
            border-radius: 10px;
            margin-top: 10px;
        }

        .container1 h1 {
            font-size: 32px;
            font-weight: bold;
        }

        .container1 label {
            display: block;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .container1 input[type="text"],
        .container1 input[type="date"],
        .container1 input[type="password"],
        .container1 select {
            width: 100%;
            height: 10%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 50px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .container1 select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath d='M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 20px;
        }

        .container1 button[type="submit"] {
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

        .container1 button[type="submit"]:hover {
            background-color: #0062cc;
        }

        .subfooter {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 10px;
            background-color: #f9f9f9bb;
        }

        .subfooter-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            align-items: center;
            padding: 10px;
            background-color: #f9f9f9bb;
        }
    </style>
</head>
<body>
   <div class="container" style="background-color: brown; text-align: center; padding:5px;">
        <p style="color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
            <span style="font-weight: bold;">SL Rail - </span>
            <span style="font-style: normal;">Revolutionizing Sri Lankan Rail Travel</span>
        </p>
    </div>
    <div class="container1">

        <h1>Employee Registration</h1>
        <form action="/SlRail/employee/register" method="post">
            <label for="full_name">Full Name:</label>
            <input type="text" id="name" name="full_name" required placeholder="Enter the Full_name">

            <label for="nic">NIC:</label>
            <input type="text" id="nic" name="nic" required placeholder="Enter the NIC ">

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="position">Position:</label>
            <select id="role" name="position" required>
                <option value="1">Station Master</option>
                <option value="2">Train Driver</option>
                <option value="3">Ticketing Officer</option>
            </select>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Add Employee</button>
        </form>
    </div>
    <div class="subfooter">
        <div class="subfooter-container">
            <h5>&copy; 2023 SL Rail. All rights reserved.</h5>
        </div>
    </div>
</body>
</html>