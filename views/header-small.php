<?php
session_start();
require_once "./function/function.php";
require_once "./function/config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Адова фармилка</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="/main"><img src="assets/img/navbar-logo.png" alt="" /></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="shop">Магазин</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="top">ТОП 10</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="donate">Инвестиции</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="about">О Нас</a></li>

                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['login'])) {
                            echo '<li class="nav-item"><form method="post"><button type="submit" class="nav-link btn" name="unset">' . $_SESSION['login'] . ' X</button></form></li>';
                        } else {
                            echo '<a class="nav-link js-scroll-trigger" href="/login">Войти</a>';
                        }
                        if (isset($_POST['unset'])) {
                            $userClass->loginUnset();
                            header("Location: https://wow.g4u.by/");
                        }

                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <div class="jumbotron header-second">
        <div class="container">
            <!-- <h1 class="display-3">Hello, world!</h1>
      <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p> -->
        </div>
    </div>

    <?php
    if (isset($_POST['buy'])) {
        $gameClass->minusSum($_SESSION['id']);
    }

    $gameClass->updateKri($_SESSION['id']);

    ?>