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
        $url = $this->prefix.'/';
        header("Location: $url");
        exit();
    }

    public function redirectLogin()
    {
        $url = $this->prefix.'/login';
        header("Location: $url");
        exit();
    }

    public function redirectRegister()
    {
        $url = $this->prefix . '/register';
        header("Location: $url");
        exit();
    }

    public function error404()
    {
        $url = $this->prefix . '/page-not-found';
        header("Location: $url");
        exit();
    }
}
