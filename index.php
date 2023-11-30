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
    'home' => ['index'],
    'passenger' => ['register', 'login', 'dashboard', 'profile','updateProfile','logout'],
    'booking' => ['search','add', 'userBookings', 'update', 'deleteBooking'],
    'review' =>['add'],
    'trainschedule' => ['addSchedule', 'viewSchedules','viewSchedulesD', 'updateSchedule', 'deleteSchedule','showSchedule'],
    'announcement' =>['viewAnnouncement','addAnnouncement','addAnnouncementD'],
    'stationmaster'=>['login','logout','dashboard'],
    'traindriver' =>['login','logout','dashboard'],
    'admin' =>['login','logout','dashboard'],
    'employee' =>['register'],
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

 
 
 
 



 
