<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once  __DIR__ . "/model/ServerPage.php";

include_once __DIR__ . '/view/header.php';

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
    header('Location: login.php');
}

// $time = time() + (3600 * 24 * 7);
// echo time() . ' - ' . $time;

?>


<main role="main" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="container">
        <section class="jumbotron text-center" style="background: url(https://www.wallpaperup.com/uploads/wallpapers/2015/09/23/808739/7cb8775799fe50f635a119345777a262-700.jpg);background-size: cover;">
            <div class="container" style="color: white;">
                <h1 class="jumbotron-heading">MU Online</h1>
                <p class="lead text-muted">Эта видеоигра понравилась 99% пользователей</p>

            </div>
        </section>



        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">



                <?php
                    $tg_user = getTelegramUserData();
                    if ($tg_user !== false) {
                        $first_name = htmlspecialchars($tg_user['first_name']);
                        $last_name = htmlspecialchars($tg_user['last_name']);
                        if (isset($tg_user['username'])) {
                            $username = htmlspecialchars($tg_user['username']);
                            $html = "<h1>Hello, <a href=\"https://t.me/{$username}\">{$first_name} {$last_name}</a>!</h1>";
                        } else {
                            $html = "<h1>Hello, {$first_name} {$last_name}!</h1>";
                        }
                        if (isset($tg_user['photo_url'])) {
                            $photo_url = htmlspecialchars($tg_user['photo_url']);
                            $html .= "<img src=\"{$photo_url}\">";
                        }
                        $html .= "<p><a href=\"?logout=1\">Log out</a></p>";
                    } else {
                        $bot_username = BOT_USERNAME;
                        $html = <<<HTML
            <h1>Hello, anonymous!</h1>
            <script async src="https://telegram.org/js/telegram-widget.js?2" data-telegram-login="{$bot_username}" data-size="large" data-auth-url="tgauth.php"></script>
            HTML;
                    }
  


                    echo <<<HTML
                    
                    {$html}
  HTML; 
                    ?>


                </div>
            </div>
        </div>
    </div>
</main>
<br>


<?php
include_once __DIR__ . '/view/footer.php';
?>