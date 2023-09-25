<?php
class Router
{
    private $routes = [];

    public function addRoute($route, $controller, $action)
    {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function route($request)
    {
        foreach ($this->routes as $route => $params) {
            if (strpos($request, $route) === 0) {
                $controllerName = $params['controller'] . 'Controller';
                $actionName = $params['action'];

                // Include the controller file
                require_once 'controllers/' . $controllerName . '.php';

                // Create an instance of the controller and call the action
                $controller = new $controllerName();
                $controller->$actionName();
                return;
                
            }
        }

        // Handle 404 - Page Not Found
        http_response_code(404);
        include('404.php');
    }
}
?>