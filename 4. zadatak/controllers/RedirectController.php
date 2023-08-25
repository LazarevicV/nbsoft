<?php

class RedirectController
{
    private $conn;
    private $prefix = PREFIX_HOME;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function redirectHome()
    {
        header("Location: $this->prefix/");
        exit();
    }

    public function redirectLogin()
    {
        header("Location: $this->prefix/login");
        exit();
    }

    public function redirectRegister()
    {
        header("Location: $this->prefix/register");
        exit();
    }

    public function error404()
    {
        header("Location: $this->prefix/page-not-found");
        exit();
    }
}
