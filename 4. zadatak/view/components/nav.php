<?php
$prefix = '/nbsoft/4.%20zadatak';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= $prefix ?>/">4. zadatak</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= $prefix ?>/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $prefix ?>/api/orders">All orders</a></li>
                <?php if (isset($_SESSION['user'])) {
                    if (!$_SESSION['user']->username === 'vlazarevic') {
                ?>
                        <li class="nav-item">
                            <a id="registerLink" class="nav-link disabled" href="<?= $prefix ?>/register" tabindex="-1" aria-disabled="true">Register</a>
                        </li>

                    <?php } else { ?>
                        <li class="nav-item">
                            <a id="registerLink" class="nav-link" href="<?= $prefix ?>/register" tabindex="-1">Register</a>
                        </li>
                    <?php }
                } else {
                    ?> <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link disabled" href="<?= $prefix ?>/register" tabindex="-1" aria-disabled="true" data-bs-toggle="tooltip" title="You are not admin, you can't access this page!">Register</a>
                    </li>
                    </li>
                <?php } ?>
                <?php if (isset($_SESSION['user'])) {
                ?>
                    <li class="nav-item"><a class="nav-link" href="<?= $prefix ?>/logout">Logout</a></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link" href="<?= $prefix ?>/login">Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>