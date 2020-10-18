<?php
use App\Service\AppService;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="/css/base.css">
    <?php foreach ($css as $cssFile) : ?>
        <link rel="stylesheet" href="/css/<?= $cssFile ?>.css">
    <?php endforeach; ?>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <header class="container header">
        <div class="header__left">
            <a class="header__button link" href="<?= AppService::getRoute('home')?>">Home</a>
        </div>
        <div class="header__right">
            <?php if (AppService::isLogged()) : ?>
                <a class="header__button link" href="<?= AppService::getRoute('userLogout')?>">Logout</a>
            <?php else : ?>
                <a class="header__button link" href="<?= AppService::getRoute('userLogin')?>">Login</a>
                <a class="header__button link" href="<?= AppService::getRoute('userRegister')?>">Register</a>
            <?php endif; ?>
        </div>
    </header>
    <div class="container">
        <div class="content">
            <?= $content ?>
        </div>
    </div>
</body>
<script type="text/javascript">
    const routes = JSON.parse('<?= AppService::getJsRoutes() ?>');
    <?php foreach ($jsVars as $key => $value) : ?>
        const <?= $key ?> = <?= is_string($value) ? "'" . $value . "'" : $value ?>;
    <?php endforeach; ?>
</script>
<script src="/js/base.js"></script>
<?php foreach ($js as $jsFile) : ?>
    <script src="/js/<?= $jsFile ?>.js"></script>
<?php endforeach; ?>
</html>
