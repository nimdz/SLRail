<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'app/models/Employee/EmployeeModel.php';
require_once 'app/models/Employee/EmailService.php';
class EmployeeController
{
    public function add()
    {
        // Start session
        session_start();
    
        // Check if form data is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate input data
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $full_name = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_SPECIAL_CHARS);
            $nic = filter_input(INPUT_POST, 'nic', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $position = filter_input(INPUT_POST, 'position', FILTER_VALIDATE_INT);
    
            // Check for missing or invalid fields
            if (!$username || !$password || !$full_name || !$nic || !$email || !$position) {
                echo "Error: Invalid or missing input data.";
                return;
            }
    
            // Create an instance of EmployeeModel
            $employeeModel = new EmployeeModel();
    
            // Register the Employee
            $registrationResult = $employeeModel->registerEmployee($username, $password, $full_name, $nic, $email, $position);
    
            if ($registrationResult) {
                // Registration successful
                echo '<script>alert("Registration Successful!")</script>';
    
                // Send registration email
                $emailService = new EmailService();
                $emailSent = $emailService->sendRegistrationEmail($email, $username, $password);
    
                if ($emailSent) {
                    echo '<script>alert("Registration email sent successfully!")</script>';
                } else {
                    echo '<script>alert("Failed to send registration email!")</script>';
                }
    
                header("Location: /SlRail/admin/dashboard");
                exit; // Terminate the script after redirection
            } else {
                // Registration failed
                echo "Error: Registration failed.";
            }
        } else {
            // If form is not submitted, include the employee registration view
            include ('app/views/Admin/employee_register.php');
        }
    }
        public function allemployees(){
     
        session_start();

        $employeeModel=new EmployeeModel();
        $employees=$employeeModel->getAllEmployees();
           
        if($employees){
           include('app/views/Admin/allemployee.php');
        }else{
            echo "You don't have any employees currently";

        }
    
    
    }
 // Controller method to handle the deletion of an employee
public function deleteEmployee()
{
   // Check if employee ID is provided
   if (!isset($_POST['employee_id']) || empty($_POST['employee_id'])) {
    // Handle error - Employee ID is missing
    echo "Employee ID is missing.";
    return;
}

// Retrieve the employee ID from the form
$employee_id = $_POST['employee_id'];

    // Delete the employee record
    $model = new EmployeeModel();
    $result = $model->deleteEmployee($employee_id);

    // Check if deletion was successful
    if ($result) {
        // Deletion successful - Redirect or display success message
        echo '<script>alert("Employee Deleted Successfully!")</script>';
        header("Location: /SlRail/employee/allemployees");
    } else {
        // Deletion failed - Display error message
        echo "Failed to delete employee.";
    }
}



}
