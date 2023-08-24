<?php

class Controller
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
}
