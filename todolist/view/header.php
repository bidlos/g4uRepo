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

    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


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
-moz-background-size: cover;
-o-background-size: cover;
-webkit-background-size: cover;
background-size: cover;
background-repeat: no-repeat;
background-position: center center;
width: 100%;
height: 300px;
">

    <script defer>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-4481610-59', 'auto');
        ga('send', 'pageview');
    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        ym(39705265, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script> <noscript>
        <div><img src="https://mc.yandex.ru/watch/39705265" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript> <!-- /Yandex.Metrika counter -->

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-8588635311388465",
            enable_page_level_ads: true
        });
    </script>


    <header>
        <div class="collapse bg-dark" id="navbarHeader">
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
                    <img src="https://img.icons8.com/clouds/50/000000/homer-simpson.png" />
                    <strong>Hommer Games</strong>

                </a>



                <script async src="https://telegram.org/js/telegram-widget.js?14" data-telegram-login="siteauth_bot" data-size="large" data-radius="0" data-onauth="onTelegramAuth(user)" data-request-access="write"></script>
                <script type="text/javascript">
                    function onTelegramAuth(user) {
                        alert('Logged in as ' + user.first_name + ' ' + user.last_name + ' (' + user.id + (user.username ? ', @' + user.username : '') + ')');
                    }
                </script>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>