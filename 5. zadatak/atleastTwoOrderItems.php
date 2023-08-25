<?php
require_once "./connection/connection.php";
require_once "./app/Response.php";

$query = 'SELECT users.ime AS "ime", users.prezime AS "prezime", orders.id as "porudzbina_id" FROM orders JOIN users ON orders.userId = users.id JOIN orderItems ON orderItems.orderId = orders.id GROUP BY orders.id, users.ime, users.prezime HAVING COUNT(orderItems.id) >= 2;';

$result = $conn->query($query);

$users = $result->fetchAll();

$title = "Users with atleast two order items";

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
                <h1>No users with two or more order items</h1>
            </div>
        <?php else : ?>
            <h1 class="">Users with atleast 2 order items</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Porudzbina id</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user->ime ?></td>
                            <td><?= $user->prezime ?></td>
                            <td><?= $user->porudzbina_id ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>