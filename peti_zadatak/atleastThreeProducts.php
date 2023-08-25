<?php

require_once "./connection/connection.php";

$query = 'SELECT
    users.ime AS `ime`,
    users.prezime AS `prezime`,
    users.username AS `username`
    FROM
    users
    JOIN
    orders ON users.id = orders.userId
    JOIN
    orderItems ON orders.id = orderItems.orderId
    GROUP BY
    users.id
    HAVING
    COUNT(DISTINCT orderItems.productId) >= 3;';
$result = $conn->query($query);

$users = $result->fetchAll();

$title = "Users that bought atleast 3 different products";
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
    <div class="container text-center">
        <?php if (count($users) === 0) : ?>
            <div class="text-center mt-5">
                <h1>There are no users that bought 3 different products</h1>
            </div>
        <?php else : ?>
            <h1 class="">Users that bought 3 different products</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user->ime ?></td>
                            <td><?= $user->prezime ?></td>
                            <td><?= $user->username ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>