<?php

class User
{
    // Dodati metode za dohvatanje i upis podataka...

    public $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getUserByUsername($username)
    {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->conn->query($sql);
        $user = $result->fetch();
        return $user;
    }

    public function saveUser($ime, $prezime, $email, $telefon, $username, $lozinka, $grad, $postanski_broj, $adresa)
    {

        // save this data in the users table
        $sql = "INSERT INTO users (ime, prezime, email, telefon, username, password, grad, postanski_broj, adresa) VALUES ('$ime', '$prezime', '$email', '$telefon', '$username', '$lozinka', '$grad', '$postanski_broj', '$adresa')";
        $result = $this->conn->query($sql);
        // $result->execute();
    }
}
