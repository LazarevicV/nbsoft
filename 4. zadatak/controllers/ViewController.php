<?php

class ViewController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function homePage()
    {
        include __DIR__ . '/../view/home.php';
    }

    public function handleSomeOtherEndpoint()
    {
        include __DIR__ . '/../view/login.php';
    }

    public function login()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            require_once __DIR__ . '/../controllers/Redirect.php';
            $redirect = new RedirectController();
            $redirect->redirectHome();
            exit();
        }
        include __DIR__ . '/../view/login.php';
    }

    public function register()
    {
        include __DIR__ . '/../view/register.php';
    }

    public function pageNotFound()
    {
        include __DIR__ . '/../view/_404.php';
    }
}
