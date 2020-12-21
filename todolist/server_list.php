<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once  __DIR__ . "/model/ServerPage.php";

include_once __DIR__ . '/view/header.php';
?>

<?php
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


                    <!-- Search Filter -->
                    <?= $ServerPageClass->ListServerButton() ?>

                    <?php
                    if (isset($_GET['version'])) {
                    ?>

                        <div class="col-md-12">
                            <h3 class="display-4">Лови список!</h3>
                            <hr>
                            <table class="table table-borderless table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Название сервера</th>
                                        <th scope="col">Версия</th>
                                        <th scope="col">Рейты</th>
                                        <th scope="col">Дата</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?= $ServerPageClass->FunctionName($_GET['version']) ?>

                                </tbody>
                            </table>
                           
                        </div>
                    <?php

                    } else {
                    ?>
                        <li href="#" class="list-group-item list-group-item-action list-group-item-primary" style="margin-top: 30px;">Найди сервер своей мечты!</li>
                    <?php
                    }
                    ?>
                    <!-- Search Filter -->

                    <!-- Banner Block -->
                    <div class="col-md-6" style="margin-top: 30px;"><img src="img/test.jpeg" alt="" srcset="" style="width: 100%;"> </div>
                    <div class="col-md-6" style="margin-top: 30px;"><img src="img/1019-hoTm3.webp" alt="" srcset="" style="width: 100%;"> </div>
                    <!-- Banner Block -->
                    
                    <!-- TOP Server List -->
                    <div class="col-sm-12 col-lg-12" style="margin-top: 30px;">
                        <div class="alert alert-secondary" role="alert">
                            ТОП 5 - Пользовательский выбор
                        </div>

                        <table class="table table-sm table-hover" style="background: #fff;">
                            <tbody>
                                <?= $ServerPageClass->ModulTop5('server_vote', '5', 'DESC') ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Server List Open -->

                    <!-- User Select -->
                    <div class="col-md-6" style="margin-top: 30px;">
                        <small>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-action list-group-item-danger">Выбор пользователей</li>
                            </ul>
                            <br>
                            <table class="table table-sm table-hover">
                                <tbody>
                                    <?= $ServerPageClass->ModulListServer('server_vote', 5, 'DESC') ?>
                                </tbody>
                            </table>

                        </small>
                    </div>
                    <!-- User Select -->

                    <!-- Open -->

                    <div class="col-md-6" style="margin-top: 30px;">
                        <small>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-action list-group-item-primary">Скоро открытие</li>
                            </ul>
                            <br>
                            <table class="table table-sm table-hover">
                                <tbody>
                                    <?= $ServerPageClass->ModulListServer('server_open', '5', 'ASC') ?>
                                </tbody>
                            </table>

                        </small>
                    </div>
                    <!-- Open -->

                    <!-- ТОП Сервер -->
                    <div class="col-md-9">
                        <?php
                        if (time() <= 2607602217) {
                            foreach ($ServerInfoClass->ShowServer('server_name') as $key => $value) {
                                if ($value['server_status'] == 3) {
                                    echo '
                            <div class="card">
                            <h5 class="card-header">ТОП Сервер</h5>
                            <div class="card-body">
                                <h5 class="card-title"><img src="https://img.icons8.com/doodle/25/000000/crown--v1.png" /> <a href="server_info.php?server=' . $value['server_name'] . '">' . $value['server_name'] . '</a> <img src="https://img.icons8.com/plasticine/25/000000/filled-like.png" /> ' . $value['server_vote'] . '</h5>
                                <p class="card-text">' . mb_strimwidth($value['server_description'], 0, 650, "...") . '</p>
                                <a href="https://energymu.ru/" class="btn btn-primary">Перейти на сервер</a>
                            </div>
                            </div>
                            ';
                                }
                            }
                        }

                        ?>
                    </div>

                    <!-- Banner Block -->

                    <div class="col-md-3">
                        <img src="img/105628.gif" alt="" srcset="" style="width: 100%;">
                    </div>

                    <!-- Banner Block -->



                </div>
            </div>
        </div>
    </div>
</main>
<br>


<?php

include_once __DIR__ . '/view/footer.php';
?>