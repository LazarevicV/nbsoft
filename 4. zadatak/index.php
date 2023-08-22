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

if ($method === 'GET') {
    // provera da li postoji get metod ka sledecoj ruti
    // ako jeste onda prikazuje json sadrzaj podataka iz baze
    if ($request === '/api/orders') {
        $order = new Order($conn);
        $data = $order->all();
        sendResponse($data);
    } else if ($request === '/api/some-other-endpoint') {
        $controller = new Controller($conn);
        $controller->handleSomeOtherEndpoint();
    } else {
        echo "404 page not found";
        // sendResponse(array('message' => 'Invalid endpoint.'), 404);
        header("Location: http://localhost/nbsoft/4.%20zadatak/view/_404.php");
        exit;
    }
} else {
    sendResponse(array('message' => 'Method not allowed.'), 405);
}
