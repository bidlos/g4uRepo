<?php
session_start();


ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="../dist/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="../dist/js/bootstrap.js"></script>
    <link href="../dist/css/album.css" rel="stylesheet">

    <meta name="theme-color" content="#563d7c">

    <link rel="shortcut icon" href="../favicon.ico">
    </head>

<body class=" bg-dark">



    <header>
        <div class="collapse bg-dark" id="navbarHeader"">
            <div class=" container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">

                    <h4 class="text-white">Выбери где зависнешь</h4>
                    <p class="text-muted">Только тут самые качественные сервера, такие как MU Online, Lineage 2, World of Warcraft...</p>

                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Навигация</h4>
                    <ul class="list-unstyled">
                        <li><a href="<?= $_SERVER['REQUEST_URI']; ?>?mu" class="text-white">MU Online</a></li>
                        <li><a href="<?= $_SERVER['REQUEST_URI']; ?>?mu" class="text-white">Кабинет</a></li>

                    </ul>
                </div>
            </div>

        </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="/todolist" class="navbar-brand d-flex align-items-center">
                    <img src="../img/logo.png" height="30px" />
                    <strong>YourLegion</strong>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

        </div>
    </header>