<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);



include_once  __DIR__ . "/../function/function.php";

define('BOT_USERNAME', 'siteauth_bot'); // place username of your bot here

function getTelegramUserData()
{
    if (isset($_COOKIE['tg_user'])) {
        $auth_data_json = urldecode($_COOKIE['tg_user']);
        $auth_data = json_decode($auth_data_json, true);
        return $auth_data;
    }

    return false;
}
if (isset($_GET['logout'])) {
    setcookie('tg_user', '');
    header('Location: index.php');
}

// $time = time() + (3600 * 24 * 7);
// echo time() . ' - ' . $time;

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
            <div class=" container">
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
                <?php
                    $tg_user = getTelegramUserData();
                    if ($tg_user !== false) {

                        if (isset($tg_user['first_name'])) {
                            $first_name = htmlspecialchars($tg_user['first_name']);
                        } else {
                            $first_name = NULL;
                        }

                        if (isset($tg_user['last_name'])) {
                            $last_name = htmlspecialchars($tg_user['last_name']);
                        } else {
                            $last_name = NULL;
                        }

                        if (isset($tg_user['username'])) {
                            $username = htmlspecialchars($tg_user['username']);
                            $idAuth = htmlspecialchars($tg_user['id']);
                            
                            $html = "<a href=\"https://t.me/{$username}\">{$first_name} {$last_name} </a>";
                        } else {
                            $html = "{$first_name} {$last_name}";
                        }

                        if (isset($tg_user['photo_url'])) {
                            $photo_url = htmlspecialchars($tg_user['photo_url']);
                            $html .= "<img src=\"{$photo_url}\">";
                        }else{
                            $html .= "<img src=\"https://gh.g4u.by/todolist/img/test.jpeg\">";
                        }

                        $html .= "<p><a href=\"?logout=1\">Log out</a></p>";
                    } else {
                        $bot_username = BOT_USERNAME;

                        $html = <<<HTML
            <script async src="https://telegram.org/js/telegram-widget.js?2" data-telegram-login="{$bot_username}" data-size="large" data-auth-url="tgauth.php"></script>
            HTML;
                    }



                    echo <<<HTML
                    
                    {$html}

                    HTML;
                    ?>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

        </div>
    </header>
