<?php

class UserController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function check_login()
    {
        // we need to check if there is user with recieved username and password
        require_once __DIR__ . '/../classes/User.php';
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!isset($username) || !isset($password)) {
            header("Location: http://localhost/nbsoft/4.%20zadatak/login");
            exit();
        }

        $user = new User($this->conn);
        $db_user = $user->getUserByUsername($username);
        if ($user) {
            $hashedPassword = hash('sha256', $password);
            if ($db_user->password === $hashedPassword) {
                session_start();
                $_SESSION['user'] = $db_user;
                $user->loggedTime(); // dodaj trenutno vreme u bazu 
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

        if (!isset($ime) || !isset($prezime) || !isset($email) || !isset($telefon) || !isset($username) || !isset($lozinka) || !isset($grad) || !isset($postanski_broj) || !isset($adresa)) {
            require_once __DIR__ . '/../controllers/RedirectController.php';
            $redirect = new RedirectController($this->conn);
            $redirect->redirectRegister();
        }

        require_once __DIR__ . '/../classes/User.php';
        $user = new User($this->conn);
        $user->saveUser($ime, $prezime, $email, $telefon, $username, $lozinka, $grad, $postanski_broj, $adresa);

        require_once __DIR__ . '/../controllers/RedirectController.php';
        $redirect = new RedirectController($this->conn);
        $redirect->redirectHome();
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: http://localhost/nbsoft/4.%20zadatak/");
        exit();
    }
}