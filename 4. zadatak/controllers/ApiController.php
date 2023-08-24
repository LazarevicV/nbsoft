<?php

require_once __DIR__ . '/../app/Response.php';

class ApiController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function users()
    {
        // first we require the Order class
        // then we use all method to get all orders
        require_once __DIR__ . '/../classes/User.php';
        $user = new User($this->conn);
        $data = $user->all();
        Response::sendResponse($data);
    }

    public function orders()
    {
        // first we require the Order class
        // then we use all method to get all orders
        require_once __DIR__ . '/../classes/Order.php';
        $order = new Order($this->conn);
        $data = $order->all();
        Response::sendResponse($data);
    }
}
