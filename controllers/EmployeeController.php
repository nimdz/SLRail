<?php

require_once 'models/Employee/EmployeeModel.php';

class EmployeeController
{
    public function register()
    {
        include 'views/Admin/employee_register.php';

        // Retrieve data from the form
        $username = $_POST['username'];
        $password = $_POST['password'];
        $full_name = $_POST['full_name'];
        $nic = $_POST['nic'];
        $email = $_POST['email'];
        $position = $_POST['position'];

        // Create an instance of EmployeeModel
        $employeeModel = new EmployeeModel();

        // Register the Employee
        $registrationResult = $employeeModel->registerEmployee($username, $password, $full_name, $nic, $email, $position);

        if ($registrationResult) {
            // Registration successful
            echo '<script>alert("Registration Successful!")</script>';
            header("Location: /SlRail/admin/dashboard");
        } else {
            // Registration failed
            echo "Error: Registration failed.";
        }
    }


}
