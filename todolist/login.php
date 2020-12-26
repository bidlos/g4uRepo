<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once  __DIR__ . "/model/User.php";

include_once __DIR__ . '/view/header.php';

?>

<?php

if (isset($idAuth)) {
    
    if ($UserClass->checkUserLogin($idAuth) == TRUE) { ?>
        <main role="main" style="margin-top: 30px; margin-bottom: 30px;">
            <div class="container">
                <section class="jumbotron text-center" style="background: url(https://www.wallpaperup.com/uploads/wallpapers/2015/09/23/808739/7cb8775799fe50f635a119345777a262-700.jpg);background-size: cover;">
                    <div class="container" style="color: white;">
                        <a href="?panel=account" class="btn btn-warning">Аккаунт</a>
                        <a href="?panel=myserver" class="btn btn-primary">Мой сервер</a>
                        <a href="?panel=ads" class="btn btn-danger">Реклама</a>

                    </div>
                </section>


                <div class="album py-5 bg-light">
                    <div class="container">
                        <?php
                        
                        print_r( $UserClass->testPDO());

                        if ($_SERVER['REQUEST_URI'] == '/todolist/login.php') {
                            echo $UserClass->addUser($idAuth, $first_name, $last_name, $username);
                        } elseif ($_GET['panel'] == 'myserver') {
                            include_once __DIR__ . '/panel/server.php';
                        } elseif ($_GET['panel'] == 'ads') {
                            include_once __DIR__ . '/panel/ads.php';
                        } elseif ($_GET['panel'] == 'account') {
                            include_once __DIR__ . '/panel/account.php';
                        }  ?>
                    </div>
                </div>
            </div>
        </main>

<?php } 
} else {
    ?><main role="main" style="margin-top: 30px; margin-bottom: 30px;">
<div class="container bg-light"><h3>Вы не вошли</h3></div>
      </main>
    <?php
} ?>
<br>


<?php
include_once __DIR__ . '/view/footer.php';
?>