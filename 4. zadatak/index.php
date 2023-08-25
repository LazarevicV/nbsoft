<?php
require_once './connection/connection.php';

// we take request and method from the server
// and we remove the prefix from the request
$request = $_SERVER['REQUEST_URI'];
$prefix = '/nbsoft/4.%20zadatak';
$request = str_replace($prefix, '', $request);
$method = $_SERVER['REQUEST_METHOD'];


$ROUTES = [
    "GET" => [
        "/" => ["viewController", "homePage"],
        "/api/users" => ["apiController", "users"],
        "/api/orders" => ["apiController", "orders"],
        "/register" => ["viewController", "register"],
        "/page-not-found" => ["viewController", "pageNotFound"],
        "/login" => ["viewController", "login"],
        "/logout" => ["userController", "logout"],
    ],
    "POST" => [
        "/check_login" => ["userController", "check_login"],
        "/process_registration" => ["userController", "process_registration"],
    ],
];

if (isset($ROUTES[$method][$request])) {
    $controllerAndMethod = $ROUTES[$method][$request];
    $controller = $controllerAndMethod[0];
    $method = $controllerAndMethod[1];

    // Get the controller class name
    $controllerClassName = ucfirst($controller);

    // Include the controller file
    require_once "./controllers/{$controllerClassName}.php";

    // Instantiate the controller
    $controllerInstance = new $controllerClassName($conn);
    $controllerInstance->$method();
} else {
    // If the route is not found, redirect to 404
    require_once './controllers/RedirectController.php';
    $redirectController = new RedirectController($conn);
    $redirectController->error404();
}
