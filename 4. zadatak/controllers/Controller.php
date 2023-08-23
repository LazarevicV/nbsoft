<?php

class Controller
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

    public function login()
    {
        include __DIR__ . '/../view/login.php';
    }

    public function check_login()
    {
        // we need to check if there is user with recieved username and password
        require_once __DIR__ . '/../classes/User.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = new User($this->conn);
        $db_user = $user->getUserByUsername($username);
        if ($user) {
            if ($db_user->password === $password) {
                session_start();
                $_SESSION['user'] = $db_user;
                header("Location: http://localhost/nbsoft/4.%20zadatak/");
                exit();
                session_write_close();
            } else {
                header("Location: http://localhost/nbsoft/4.%20zadatak/login");
                exit();
            }
        } else {
            header("Location: http://localhost/nbsoft/4.%20zadatak/login");
            exit();
        }
    }

    public function process_registration()
    {
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $email = $_POST['email'];
        $telefon = $_POST['telefon'];
        $username = $_POST['username'];
        $lozinka = $_POST['lozinka'];
        $grad = $_POST['grad'];
        $postanski_broj = $_POST['postanski_broj'];
        $adresa = $_POST['adresa'];

        require_once __DIR__ . '/../classes/User.php';
        $user = new User($this->conn);
        $user->saveUser($ime, $prezime, $email, $telefon, $username, $lozinka, $grad, $postanski_broj, $adresa);

        header("Location: http://localhost/nbsoft/4.%20zadatak/registration");
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: http://localhost/nbsoft/4.%20zadatak/");
        exit();
    }

    public function register()
    {
        include __DIR__ . '/../view/register.php';
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
        // header("Location: http://localhost/nbsoft/4.%20zadatak/register");
        include __DIR__ . '/../view/register.php';
        exit();
    }

    public function pageNotFound()
    {
        include __DIR__ . '/../view/_404.php';
    }

    public function error404()
    {
        header("Location: http://localhost/nbsoft/4.%20zadatak/page-not-found");
        exit();
    }
}
