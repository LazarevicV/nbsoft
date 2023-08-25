<?php

require_once "./connection/connection.php";

$query = "SELECT * 
FROM users
WHERE last_login >= NOW() - INTERVAL 2 DAY;";
$result = $conn->query($query);

$users = $result->fetchAll();

$title = "Users logged in within two days";

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
    <?php include './components/nav.php' ?>
    <!-- Page content-->

    <div class="container text-center">
        <?php if (count($users) === 0) : ?>
            <div class="text-center mt-5">
                <h2>No users logged in within two days</h2>
            </div>
        <?php else : ?>
            <h1>Users logged in within two days</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Username</th>
                        <th>Last login</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user->ime ?></td>
                            <td><?= $user->prezime ?></td>
                            <td><?= $user->username ?></td>
                            <td><?= $user->last_login ?></td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>