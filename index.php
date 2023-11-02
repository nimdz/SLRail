<?php
/**
 * User: nimsaradz
 * Date: 2023-09-24
 */

require_once 'includes/Router.php';

// Initialize the router
$router = new Router();

// Define a base URL
$baseUrl = '/SlRail';

// Define controllers and their actions
$controllers = [
    'Home' => ['index'],
    'passenger' => ['register', 'login', 'dashboard', 'logout'],
    'booking' => ['add', 'userBookings', 'update', 'deleteBooking'],
    'employee' => ['login', 'logout', 'dashboard'],
    'TrainSchedule' => ['addSchedule', 'viewSchedules', 'updateSchedule', 'deleteSchedule'],
];

// Create routes for each controller and action
foreach ($controllers as $controller => $actions) {
    foreach ($actions as $action) {
        $route = "$baseUrl/$controller/$action";
        $router->addRoute($route, $controller, $action);
    }
}

// Get the requested URL
$request = $_SERVER['REQUEST_URI'];

// Route the request
$router->route($request);
?>

 
 
 
 



 
