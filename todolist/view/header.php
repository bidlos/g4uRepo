<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once  __DIR__ . "/../function/function.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="dist/css/bootstrap.min.css" crossorigin="anonymous">

    <meta name="theme-color" content="#563d7c">

    <link rel="shortcut icon" href="favicon.ico">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
    <script src="/dist/js/bootstrap.js"></script>
</head>

<body style="
background-image: url(img/bg.jpg);
background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: inherit;
    background-color: black;
">



    <header>
        <div class="collapse bg-dark" id="navbarHeader"">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">

                        <h4 class="text-white">Выбери где зависнешь</h4>
                        <p class="text-muted">Только тут самые качественные сервера, такие как MU Online, Lineage 2, World of Warcraft...</p>

                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Навигация</h4>
                        <ul class="list-unstyled">
                            <li><a href="<?= $_SERVER['REQUEST_URI']; ?>server_list.php?game=mu" class="text-white">MU Online</a></li>
                            <li><a href="<?= $_SERVER['REQUEST_URI']; ?>server_list.php?game=la2" class="text-white">LineAge II</a></li>
                            <li><a href="<?= $_SERVER['REQUEST_URI']; ?>server_list.php?game=wow" class="text-white">World of Warcraft</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="/todolist" class="navbar-brand d-flex align-items-center">
                    <img src="img/logo.png" height="30px" />
                    <strong>YourLegion</strong>

                </a>



                <!-- <script async src="https://telegram.org/js/telegram-widget.js?14" data-telegram-login="siteauth_bot" data-size="large" data-radius="0" data-onauth="onTelegramAuth(user)" data-request-access="write"></script>
                <script type="text/javascript">
                    function onTelegramAuth(user) {
                        alert('Logged in as ' + user.first_name + ' ' + user.last_name + ' (' + user.id + (user.username ? ', @' + user.username : '') + ')');
                    }
                </script> -->


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>