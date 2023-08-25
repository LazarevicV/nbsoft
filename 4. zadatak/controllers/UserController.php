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
        require_once __DIR__ . "/RedirectController.php";
        $redirectController = new RedirectController($this->conn);
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!isset($username) || !isset($password)) {
            $redirectController->redirectLogin();
            exit();
        }

        $user = new User($this->conn);
        $db_user = $user->getUserByUsername($username);

        if ($db_user) {
            $hashedPassword = hash('sha256', $password);
            if ($db_user->password === $hashedPassword) {
                session_start();
                $_SESSION['user'] = $db_user;
                $user->loggedTime(); // dodaj trenutno vreme u bazu
                $redirectController->redirectHome();
                session_write_close();
                exit();
            } else {
                $redirectController->redirectLogin();
                exit();
            }
        } else {
            $redirectController->redirectLogin();
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
            require_once __DIR__ . "/RedirectController.php";
            $redirect = new RedirectController($this->conn);
            $redirect->redirectRegister();
            exit();
        }

        require_once __DIR__ . '/../classes/User.php';
        $user = new User($this->conn);
        $user->saveUser($ime, $prezime, $email, $telefon, $username, $lozinka, $grad, $postanski_broj, $adresa);

        require_once __DIR__ . "/RedirectController.php";
        $redirect = new RedirectController($this->conn);
        $redirect->redirectHome();
        exit();
    }

    public function logout()
    {
        session_start();
        session_destroy();
        require_once __DIR__ . '/RedirectController.php';
        $redirectController = new RedirectController
        ($this->conn);
        $redirectController->redirectHome();
        exit();
    }
}
