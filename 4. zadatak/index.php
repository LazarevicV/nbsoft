<?php
require_once './connection/connection.php';
require_once './classes/Order.php';

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

if ($method === 'GET') {
    if ($request === '/') {
        // this is the home page of the application
        $controller->homePage();
    }
    // provera da li postoji get metod ka sledecoj ruti
    // ako postoji onda prikazuje json sadrzaj podataka iz baze
    if ($request === '/api/orders') {
        $controller->orders();
    } else if ($request === '/api/some-other-endpoint') {
        $controller->handleSomeOtherEndpoint();
    } else {
        // $controller->error404();
    }
} else {
    echo "Method je post";
}
