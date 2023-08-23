<?php

session_start();
$title = "Home page";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>

<body>
    <?php include __DIR__ . '/components/nav.php' ?>
    <!-- Page content-->
    <div class="container">
        <div class="text-center mt-5">
            <h2>Currently working routes:</h2>
            <a href="http://localhost/nbsoft/4.%20zadatak/">Home route</a><br>
            <a href="http://localhost/nbsoft/4.%20zadatak/api/orders">All orders api route</a><br>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']->role == 'admin') {
            ?> <a href="http://localhost/nbsoft/4.%20zadatak/register">Register page</a>
            <?php }  ?>
            <?php if (!isset($_SESSION['user'])) {
            ?> <a href="http://localhost/nbsoft/4.%20zadatak/login">Login page</a>
            <?php }  ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>