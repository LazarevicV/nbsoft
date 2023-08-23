<?php
require_once './connection/connection.php';

// this function is used to send response to the client
function sendResponse($data, $statusCode = 200)
{
    http_response_code($statusCode);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

// we take request and method from the server
// and we remove the prefix from the request
$request = $_SERVER['REQUEST_URI'];
$prefix = '/nbsoft/4.%20zadatak';
$request = str_replace($prefix, '', $request);
$method = $_SERVER['REQUEST_METHOD'];

// echo $request;

require_once './controllers/Controller.php';

$controller = new Controller($conn);

// check if there is get method for certain route
if ($method === 'GET') {
    if ($request === '' || $request === '/') {
        // this is the home page of the application
        $controller->homePage();
    }
    // provera da li postoji get metod ka sledecoj ruti
    // ako postoji onda prikazuje json sadrzaj podataka iz baze
    else if ($request === '/api/orders') {
        $controller->orders();
    } else if ($request === '/register') {
        session_start();
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']->role == "admin") {
                $controller->redirectRegister();
            } else {
                $controller->redirectLogin();
            }
        } else {
            $controller->redirectLogin();
        }
    } else if ($request === '/page-not-found') {
        $controller->pageNotFound();
    } else if ($request === '/login') {
        $controller->login();
    } else if ($request === '/logout') {
        $controller->logout();
    } else {
        $controller->error404();
    }
} else { // if there is no get method, it means that there is post method
    if ($request === '/check_login') {
        $controller->check_login();
    }
    if ($request === '/process_registration') {
        $controller->process_registration();
    } else {
        $controller->error404();
    }
}
