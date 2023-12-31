<?php

session_start();
$title = "Home page";
$prefix = PREFIX_HOME;
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
            <h1>Welcome<?php if (isset($_SESSION['user'])) {
                        ?> <?= $_SESSION['user']->role ?> <?php }
                                                            ?>
            </h1>
            <h2>Currently working routes:</h2>
            <a href="<?= $prefix ?>/">Home route</a><br>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']->role == 'admin') {
            ?>
                <a href="<?= $prefix ?>/api/orders">All orders
                    api route</a><br>
                <a href="<?= $prefix ?>/register">Register page</a><br>
                <a href="<?= $prefix ?>/api/users">Check all users from database</a><br>
            <?php }  ?>
            <?php if (!isset($_SESSION['user'])) {
            ?> <a href="<?= $prefix ?>/login">Login page</a>
            <?php }  ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>