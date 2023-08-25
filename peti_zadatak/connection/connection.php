<?php

require_once "config.php";

try {
    $conn = new PDO("mysql:host=" . SERVERNAME . ";dbname=" . DBNAME . ";charset=utf8;", USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    // echo "Uspesna konekcija";
} catch (PDOException $e) {
    echo $e->getMessage();
}
