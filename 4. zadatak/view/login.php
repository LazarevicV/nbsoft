<?php

session_start();
$title = "Registration page";
$prefix = '/nbsoft/4.%20zadatak';

?>

<?php

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
        <h1>Login page</h1>
    </div>

    <div class="container">
        <form action="<?= $prefix ?>/check_login" method="POST">
            <div class="form-row">
                <div class="col-5">
                    <label class="sr-only" for="inlineFormInput">Username</label>
                    <input required type="text" class="form-control mb-2" id="username" name="username" placeholder="Your username">
                </div>
                <div class="col-5">
                    <label class="sr-only" for="inlineFormInput">Password</label>
                    <input required type="password" class="form-control mb-2" id="password" name="password" placeholder="Your password">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>