<?php

class Order
{
    // public $id;
    // public $userId;
    // public $value;
    // public $dateCreate;
    // public $dateEdit;

    public $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function all()
    {
        $sql = "SELECT * FROM orderr";
        $query = $this->conn->query($sql);
        $orders = $query->fetchAll();
        return $orders;
    }
}
