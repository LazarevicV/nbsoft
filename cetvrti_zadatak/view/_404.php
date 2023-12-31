<?php
$prefix = PREFIX_HOME;
$title = "404 Error Page";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex flex-column align-items-center
    justify-content-center vh-100 bg-primary">
        <h1 class="display-1 fw-bold text-white">404
            page not found</h1>
        <h3><a class="text-white" href="<?= $prefix ?>/">Go
                back
                home</a></h3>
    </div>
</body>

</html>