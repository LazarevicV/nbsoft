<?php

class RedirectController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function redirectHome()
    {
        header("Location: http://localhost/nbsoft/4.%20zadatak/");
        exit();
    }

    public function redirectLogin()
    {
        header("Location: http://localhost/nbsoft/4.%20zadatak/login");
        exit();
    }

    public function redirectRegister()
    {
        header("Location: http://localhost/nbsoft/4.%20zadatak/register");
        exit();
    }

    public function error404()
    {
        header("Location: http://localhost/nbsoft/4.%20zadatak/page-not-found");
        exit();
    }
}
