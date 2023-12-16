<?php
/**
 * User: nimsaradz
 * Date: 2023-09-24
 */

require_once 'app/includes/Router.php';

// Initialize the router
$router = new Router();

// Define a base URL
$baseUrl = '/SlRail';

// Define controllers and their actions
$controllers = [
    'home' => ['index','login'],
    'passenger' => ['register', 'dashboard', 'profile','forgotPassword','updateProfile','viewLocation','logout'],
    'booking' => ['search','add', 'userBookings', 'update', 'deleteBooking'],
    'review' =>['add'],
    'trainschedule' => ['addSchedule', 'viewSchedules','tdviewSchedules', 'updateSchedule', 'deleteSchedule','showSchedule'],
    'announcement' =>['viewAnnouncement','addAnnouncement','tdaddAnnouncement'],
    'stationmaster'=>['logout','dashboard','profile','updateProfile'],
    'traindriver' =>['profile','logout','updateProfile','shareLocation','dashboard'],
    'ticketingofficer' =>['logout','dashboard'],
    'admin' =>['logout','dashboard', 'allPassengers'],
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

 
 
 
 



 
