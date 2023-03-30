<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/server-practice/public/assets/styles.css">
    <title>Pop it MVC</title>
</head>
<body>
<header>
    <div class="header">
        <h1 class="header-title">Учет пациентов</h1>
    </div>
    <div class="nav-container">
        <nav class="nav">
            <a href="<?= app()->route->getUrl('/hello') ?>">Главная</a>
            <?php
            if (!app()->auth::check()):
                ?>
                <a href="<?= app()->route->getUrl('/login') ?>">Вход</a>
<!--                <a href="--><?php //= app()->route->getUrl('/signup') ?><!--">Регистрация</a>-->
            <?php
            else:
                ?>
                <?php
                if (app()->auth::user()->role == 1):
                    ?>
                    <a href="<?= app()->route->getUrl('/admin') ?>">Админ панель</a>
                <?php
                endif;
                ?>
                <a href="<?= app()->route->getUrl('/choices') ?>">Перейти к выборке</a>
                <a href="<?= app()->route->getUrl('/reception') ?>">Перейти к добавлению</a>
                <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->name ?>)</a>
            <?php
            endif;
            ?>
        </nav>
    </div>
</header>
<main class="main">
    <!--⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣷⡀⠀-->
    <!--⠀⠀⠀⠉⠉⠉⠙⠻⣿⣿⠿⠿⠛⠛⠛⠻⣿⣿⣇⠀-->
    <!--⠀⠀⢤⣀⣀⣀⠀⠀⢸⣷⡄⠀⣁⣀⣤⣴⣿⣿⣿⣆-->
    <!--⠀⠀⠀⠀⠹⠏⠀⠀⠀⣿⣧⠀⠹⣿⣿⣿⣿⣿⡿⣿-->
    <!--⠀⠀⠀⠀⠀⠀⠀⠀⠀⠛⠿⠇⢀⣼⣿⣿⠛⢯⡿⡟-->
    <!--⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠦⠴⢿⢿⣿⡿⠷⠀⣿⠀-->
    <!--⠀⠀⠀⠀⠀⠀⠀⠙⣷⣶⣶⣤⣤⣤⣤⣤⣶⣦⠃⠀-->
    <!--⠀⠀⠀⠀⠀⠀⠀⢐⣿⣾⣿⣿⣿⣿⣿⣿⣿⣿⠀⠀-->
    <!--⠀⠀⠀⠀⠀⠀⠀⠈⣿⣿⣿⣿⣿⣿⣿⣿⣿⡇⠀⠀-->
    <!--⠀⠀⠀⠀⠀⠀⠀⠀⠀⠙⠻⢿⣿⣿⣿⣿⠟-->
    <?= $content ?? '' ?>
</main>
<footer class="footer">
    <img src="public/assets/img/umbrella.png" alt="Umbrella logo">
    <span>Umbrella Corporation &copy;</span>
</footer>
</body>
</html>
