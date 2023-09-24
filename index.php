<?php 
/**
 * User: nimsaradz
 * Date: 2023-09-24
 */

require_once 'controllers/HomeController.php';
require_once 'controllers/PassengerController.php';

// Get the requested URL
$request = $_SERVER['REQUEST_URI'];

// Route to the appropriate controller and action
if ($request === '/Slrail/home') {
    $controller = new HomeController();
    $controller->index();
} elseif (strpos($request, '/Slrail/passenger/register') === 0) {
    $controller = new PassengerController();
    $controller->registerPage();
} else {
    // Handle 404 - Page Not Found
    http_response_code(404);
    include('404.php');
}


 
 
 
 ?>
 
 
 
 



 
