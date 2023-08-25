<?php
$prefix = PREFIX;
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= $prefix ?>/">5. zadatak</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= $prefix ?>/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $prefix ?>/users.php">a)</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $prefix ?>/totalValueOrders.php">b)</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $prefix ?>/moreThenTwoOrders.php">c)</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $prefix ?>/countOfOrderItems.php">d)</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $prefix ?>/atleastTwoOrderItems.php">e)</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $prefix ?>/atleastThreeProducts.php">e)</a></li>
            </ul>
        </div>
    </div>
</nav>