<?php 
/**
 * User: nimsaradz
 * Date: 2023-09-24
 */

 require_once 'includes/Router.php';
 

 // Initialize the router
 $router = new Router();
 
 //  routes
 $router->addRoute('/SlRail/home', 'Home', 'index');
 $router->addRoute('/SlRail/passenger/register', 'Passenger', 'register');
 $router->addRoute('/SlRail/passenger/login', 'Passenger', 'login');
 $router->addRoute('/SlRail/passenger/dashboard', 'Passenger', 'dashboard');
 $router->addRoute('/SlRail/passenger/logout','Passenger','logout');
 $router->addRoute('/SlRail/booking/add','Booking','booking');



 // Get the requested URL
 $request = $_SERVER['REQUEST_URI'];
 
 // Route the request
 $router->route($request);
 

 
 
 
 ?>
 
 
 
 



 
