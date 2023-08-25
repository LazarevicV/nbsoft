<?php
require_once __DIR__ . '/../controllers/Controller.php';
class ViewController extends Controller
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function homePage()
    {
        $this->renderHtml('home', []);
    }

    // public function handleSomeOtherEndpoint()
    // {
    //     include __DIR__ . '/../view/login.php';
    // }

    public function login()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            require_once __DIR__ . '/../controllers/RedirectController.php';
            $redirect = new RedirectController($this->conn);
            $redirect->redirectHome();
            exit();
        }
        $this->renderHtml('login', []);
    }

    public function register()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            require_once __DIR__ . '/../controllers/RedirectController.php';
            $redirect = new RedirectController($this->conn);
            $redirect->redirectHome();
            exit();
        }
        $this->renderHtml('register', []);
    }

    public function pageNotFound()
    {
        $this->renderHtml('404', []);
    }
}
