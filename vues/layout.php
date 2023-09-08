<?php
$dirs = __DIR__;
$dirs = str_replace("vues", "", $dirs);
require_once $dirs . '/include/config.php'; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php require_once $dirs . '/partials/head.php'; ?>
</head>

<body>
    <?php require_once $dirs . '/partials/header.php'; ?>
    <?php echo $content ?>
    <?php require_once $dirs . '/partials/footer.php'; ?>
</body>

</html>