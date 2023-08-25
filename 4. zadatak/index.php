<?php
require_once './connection/connection.php';
// require_once './controllers/Controller.php';
// require_once './controllers/ApiController.php';
// require_once './controllers/RedirectController.php';
// require_once './controllers/UserController.php';
// require_once './controllers/ViewController.php';

// we take request and method from the server
// and we remove the prefix from the request
$request = $_SERVER['REQUEST_URI'];
$prefix = '/nbsoft/4.%20zadatak';
$request = str_replace($prefix, '', $request);
$method = $_SERVER['REQUEST_METHOD'];

// initialize controllers
// $controller = new Controller($conn);
// $apiController = new ApiController($conn);
// $redirectController = new RedirectController($conn);
// $userController = new UserController($conn);
// $viewController = new ViewController($conn);

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
    $redirectController->error404();
}

// check if there is get method for certain route
// if ($method === 'GET') {
//     if ($request === '' || $request === '/') {
//         // this is the home page of the application
//         $viewController->homePage();
//     } else if ($request === '/api/users') {
//         $apiController->users();
//     }
//     // provera da li postoji get metod ka sledecoj ruti
//     // ako postoji onda prikazuje json sadrzaj podataka iz baze
//     else if ($request === '/api/orders') {
//         $apiController->orders();
//     } else if ($request === '/register') {
//         session_start();
//         if (isset($_SESSION['user'])) { // we check if there is logged user
//             if ($_SESSION['user']->role == "admin") { // and if his role is admin
//                 $viewController->register(); // if its admin we can show him register page
//             } else {
//                 $redirectController->redirectHome(); // if its not admin we redirect him to home page
//             }
//         } else {
//             $redirectController->redirectLogin(); // same if the user is not logged in, but on login page
//         }
//     } else if ($request === '/page-not-found') {
//         $viewController->pageNotFound();
//     } else if ($request === '/login') {
//         $viewController->login();
//     } else if ($request === '/logout') {
//         $userController->logout();
//     } else {
//         $redirectController->error404();
//     }
// } else { // if there is no get method, it means that there is post method
//     if ($request === '/check_login') {
//         $userController->check_login();
//     }
//     if ($request === '/process_registration') {
//         $userController->process_registration();
//     } else {
//         $redirectController->error404();
//     }
// }
