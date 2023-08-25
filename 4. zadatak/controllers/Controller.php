<?php

class Controller
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    function renderHtml($viewname, $data)
    {
        include 'view/' . $viewname . ".php";
    }

    function renderJson($data)
    {
        echo json_encode($data);
    }
}
