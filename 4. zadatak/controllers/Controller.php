<?php

class Controller
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function orders()
    {
        // first we require the Order class
        // then we use all method to get all orders
        require_once __DIR__ . '/../classes/Order.php';
        $order = new Order($this->conn);
        $data = $order->all();
        sendResponse($data);
    }

    // Add other methods to handle different routes

    public function handleSomeOtherEndpoint()
    {
        include __DIR__ . '/../view/login.php';
    }

    public function error404()
    {
        header("Location: http://localhost/nbsoft/4.%20zadatak/view/_404.php");
        exit();
    }
}
