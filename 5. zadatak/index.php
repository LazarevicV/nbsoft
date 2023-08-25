<?php $title = "Home page"; ?>

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
    <div class="container">
        <div class="text-center mt-5">
            <h2>Currently working routes:</h2>
            <a href="http://localhost/nbsoft/5.%20zadatak/">Home route</a><br>
            <a href="http://localhost/nbsoft/5.%20zadatak/users.php">Users logged withing two days</a><br>
            <a href="http://localhost/nbsoft/5.%20zadatak/totalValueOrders.php">Total value of orders for each user</a><br>
            <a href="http://localhost/nbsoft/5.%20zadatak/moreThenTwoOrders.php">Users with atleast two orders</a><br>
            <a href="http://localhost/nbsoft/5.%20zadatak/countOfOrderItems.php">
                Count of order items for each user
            </a><br>
            <a href="http://localhost/nbsoft/5.%20zadatak/moreThenTwoOrders.php">Users with atleast two order items</a><br>
            <a href="http://localhost/nbsoft/5.%20zadatak/atleastThreeProducts.php">Users that bought atleast 3 different products</a><br>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>