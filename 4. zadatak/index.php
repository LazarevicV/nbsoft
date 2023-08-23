<?php
require_once './connection/connection.php';
require_once './classes/Order.php';

function sendResponse($data, $statusCode = 200)
{
    http_response_code($statusCode);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

$request = $_SERVER['REQUEST_URI'];
$prefix = '/nbsoft/4.%20zadatak';
$request = str_replace($prefix, '', $request);
$method = $_SERVER['REQUEST_METHOD'];

require_once './controllers/Controller.php';

// echo $request;
// echo "<br>";
// echo $method;
// echo "<br>";

$controller = new Controller($conn);

if ($method === 'GET') {
    // provera da li postoji get metod ka sledecoj ruti
    // ako jeste onda prikazuje json sadrzaj podataka iz baze
    if ($request === '/api/orders') {
        $controller->orders();
    } else if ($request === '/api/some-other-endpoint') {
        $controller->handleSomeOtherEndpoint();
    } else {
        $controller->error404();
    }
} else {
    echo "Method je post";
}
