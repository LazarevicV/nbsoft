<?php

require_once "./connection/connection.php";

$query = 'SELECT users.ime AS `ime`, users.prezime AS `prezime`, orders.id AS `porudzbine`, ROUND(SUM(OrderItems.value * Product.price), 2) AS `ukupna_cena_porudzbine`
FROM users 
JOIN orders ON users.id = orders.userId 
JOIN OrderItems ON orders.id = OrderItems.orderId 
JOIN Product ON OrderItems.productId = Product.id
GROUP BY users.id, orders.id';
$result = $conn->query($query);

$users = $result->fetchAll();

?>

<?php

session_start();
$title = "Total value of orders";
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
                <h2>No users in the database with orders</h2>
            </div>
        <?php else : ?>
            <h1>Users, orders and total value</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Porudzbine</th>
                        <th>Ukupna vrednost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user->ime ?></td>
                            <td><?= $user->prezime ?></td>
                            <td><?= $user->porudzbine ?></td>
                            <td><?= $user->ukupna_cena_porudzbine ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>