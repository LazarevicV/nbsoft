<?php

$title = "Registration page";
$prefix = '/nbsoft/4.%20zadatak';

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
        <h1>Registration page</h1>
    </div>

    <div class="container col-md-6">
        <form action="<?= $prefix ?>/process_registration" method="post">
            <div class="mb-3">
                <label for="ime" class="form-label">Ime</label>
                <input type="text" class="form-control" id="ime" name="ime">
            </div>
            <div class="mb-3">
                <label for="prezime" class="form-label">Prezime</label>
                <input type="text" class="form-control" id="prezime" name="prezime">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="telefon" class="form-label">Telefon</label>
                <input type="tel" class="form-control" id="telefon" name="telefon">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Korisničko ime</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Lozinka</label>
                <input type="password" class="form-control" id="password" name="lozinka">
            </div>
            <div class="mb-3">
                <label for="grad" class="form-label">Grad</label>
                <input type="text" class="form-control" id="grad" name="grad">
            </div>
            <div class="mb-3">
                <label for="postanski_broj" class="form-label">Poštanski broj</label>
                <input type="text" class="form-control" id="postanski_broj" name="postanski_broj">
            </div>
            <div class="mb-3">
                <label for="adresa" class="form-label">Adresa</label>
                <input type="text" class="form-control" id="adresa" name="adresa">
            </div>
            <button type="submit" class="btn btn-primary">Registruj se</button>
        </form>
    </div>
</body>

</html>