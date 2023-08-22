<?php

class Controller
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function handleOrdersRoute()
    {
        require_once __DIR__ . '/../classes/Order.php';
        $order = new Order($this->conn);
        $data = $order->all();
        return $data;
    }

    // Add other methods to handle different routes

    public function handleSomeOtherEndpoint()
    {
        include __DIR__ . '/../view/login.php';
    }
}
