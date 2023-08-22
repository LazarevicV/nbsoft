<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $dbname = "nbsoft_2zadatak";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $firstName = $_POST['ime'];
    $lastName = $_POST['prezime'];
    $pol = $_POST['pol'];
    $godinaRodjenja = $_POST['godinaRodjenja'];
    $grad = $_POST['grad'];
    $adresa = $_POST['adresa'];
    if ($_POST['prihvati'] == 'true') {
        $prihvati = 1;
    } else {
        $prihvati = 0;
    }

    $smtm = $conn->prepare("INSERT INTO user (firstName, lastName, pol, godinaRodjenja, grad, adresa, prihvati) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $smtm->bindParam(1, $firstName);
    $smtm->bindParam(2, $lastName);
    $smtm->bindParam(3, $pol);
    $smtm->bindParam(4, $godinaRodjenja);
    $smtm->bindParam(5, $grad);
    $smtm->bindParam(6, $adresa);
    $smtm->bindParam(7, $prihvati);

    $smtm->execute();
    echo json_encode(array("message" => "Data successfully inserted"));
    http_response_code(201);
}
