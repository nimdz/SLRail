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
    'booking' => ['info','search','add', 'userBookings', 'update', 'deleteBooking','downloadTicketPdf','selectroute'],
    'review' =>['add'],
    'train'  =>['addTrain','view','track','adView','updateTrain','deleteTrain','loadForm'],
    'trainlocation'  =>['shareLocation','view','load','location_form'],
    'employee' =>['add','allemployees'],
    'stopping'=>['addStopping','getStoppingsByScheduleId','selectSchedule','displayStoppings','updateStopping','deleteStopping'],
    'trainschedule' => ['addSchedule', 'viewSchedules','tdviewSchedules','adviewSchedules', 'updateSchedule', 'deleteSchedule','searchSchedule','filter','stoppings','getTrains_route','loadupdateForm'],
    'announcement' =>['viewAnnouncement','addAnnouncement','tdaddAnnouncement','smviewAnnouncement','updateAnnouncement','deleteAnnouncement'],
    'stationmaster'=>['logout','dashboard','profile','updateProfile','trainsAdd'],
    'station' =>['addStation','searchStations','fetchStations','updateStation','deleteStation'],
    'traindriver' =>['profile','logout','updateProfile','shareLocation','dashboard'],
    'ticketingofficer' =>['logout','dashboard'],
    'admin' =>['logout','dashboard', 'allPassengers'],
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

 
 
 
 



 
