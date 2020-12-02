<?php
include_once __DIR__ . '/view/header.php';
?>
<main role="main" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="container">
        <section class="jumbotron text-center" style="background: url(https://wallpaperaccess.com/full/2651744.jpg);background-size: cover;">
            <div class="container">
                <h1 class="jumbotron-heading">MU Online</h1>
                <p class="lead text-muted">Эта видеоигра понравилась 99% пользователей</p>

                <!-- <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p> -->
            </div>


        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">

                    <!-- Список серверов -->
                    <div class="col-md-12">
                        <?php
foreach ($ServerInfoClass->ShowServer('server_name') as $key => $value) {
    if ($value['server_status'] == 2) {
        echo '
                            <div class="card">
                            <h5 class="card-header">ТОП Сервер</h5>
                            <div class="card-body">
                                <h5 class="card-title"><img src="https://img.icons8.com/doodle/25/000000/crown--v1.png" /> <a href="server_info.php?server=' . $value['server_name'] . '">' . $value['server_name'] . '</a> <img src="https://img.icons8.com/plasticine/25/000000/filled-like.png" /> ' . $value['server_vote'] . '</h5>
                                <p class="card-text">' . mb_strimwidth($value['server_description'], 0, 250, "...") . '</p>
                                <a href="https://energymu.ru/" class="btn btn-alert"><img src="https://img.icons8.com/flat_round/64/000000/right--v1.png" /></a>
                            </div>
                            </div>
                            ';
    }
}
?>
                    </div>
                                        <div class="col-md-6" style="margin-top: 30px;">
                            <ul class="list-group">
                            <li class="list-group-item list-group-item-action list-group-item-danger">Выбор пользователей</li>

  <?php
foreach ($ServerInfoClass->ShowServer('server_name') as $key => $value) {
    if ($value['server_status'] >= 0) {
        echo '
        <li class="list-group-item">

        <img src="' . $value['server_img'] . '" class="mr-3" alt="..." height="30px">
        <a href="server_info.php?server=' . $value['server_name'] . '">' . $value['server_title'] . '</a>

        <img src="https://img.icons8.com/ios/30/000000/experiment-trial.png"/> ' . $value['server_version'] . '
        <img src="https://img.icons8.com/fluent-systems-regular/30/000000/sample-rate.png"/> X' . $value['server_rate'] . '
        <img src="https://img.icons8.com/plasticine/30/000000/filled-like.png" /> ' . $value['server_vote'] . '

        <a href="http://' . $value['server_url'] . '" class="float-right" height="30px"><img src="https://img.icons8.com/dotty/30/000000/down-right.png"/></a>
        </li>';
    }
}
?>
</ul>
                            </div>
                             <div class="col-md-6" style="margin-top: 30px;">
                            <ul class="list-group">
                            <li class="list-group-item list-group-item-action list-group-item-primary">Скоро открытие</li>
  <?php
foreach ($ServerInfoClass->ShowServer('server_name') as $key => $value) {
    if ($value['server_status'] >= 0) {
        echo '
        <li class="list-group-item">

        <img src="' . $value['server_img'] . '" class="mr-3" alt="..." height="30px">
        <a href="server_info.php?server=' . $value['server_name'] . '">' . $value['server_title'] . '</a>

        <img src="https://img.icons8.com/ios/30/000000/experiment-trial.png"/> ' . $value['server_version'] . '
        <img src="https://img.icons8.com/fluent-systems-regular/30/000000/sample-rate.png"/> X' . $value['server_rate'] . '
        <img src="https://img.icons8.com/plasticine/30/000000/filled-like.png" /> ' . $value['server_vote'] . '

        <a href="http://' . $value['server_url'] . '" class="float-right" height="30px"><img src="https://img.icons8.com/dotty/30/000000/down-right.png"/></a>
        </li>';
    }
}
?>
</ul>
                            </div>
                    <div class="col-md-9" style="margin-top: 30px;">
                    <h3>Бодрый старт</h3>
                    <hr>
                        <ul class="list-unstyled">

                            <?php
foreach ($ServerInfoClass->ShowServer('server_name') as $key => $value) {
    if ($value['server_status'] == 1) {
        echo '
                                    <li class="media">
                                    <img src="' . $value['server_img'] . '" class="mr-3" alt="...">
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1"><a href="server_info.php?server=' . $value['server_name'] . '">' . $value['server_title'] . '</a></h5>
                                        ' . mb_strimwidth($value['server_description'], 0, 120, "...") . '
                                        <br><img src="https://img.icons8.com/plasticine/25/000000/filled-like.png" /> ' . $value['server_vote'] . '
                                    </div>
                                    <a href="' . $value['server_url'] . '" class="btn"><img src="https://img.icons8.com/flat_round/40/000000/right--v1.png" /></a>
                                    </li>
                                    ';
    }
}
?>
                        </ul>
                    </div>
                    <div class="col-md-3" style="margin-top: 30px;">
                        <div class="widget widget-tags">
                            <div class="widget-header font-size-xs mb-2"><img src="https://img.icons8.com/material-outlined/24/000000/2008.png" /> Сезоны</div>
                            <div class="tags">
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">S6 (51)</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">S3 (30)</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">S4 (19)</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">97d-99i (6)</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">S9 (4)</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">S12 (2)</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">S8 (1)</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">S2 (1)</a>
                            </div>
                        </div><br>
                        <div class="widget widget-tags">
                            <div class="widget-header font-size-xs mb-2"><img src="https://img.icons8.com/wired/24/000000/connection-status-on.png" /> Рейты</div>
                            <div class="tags">
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">x10</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">x50</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">x100</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">x1000</a>
                                <a class="btn btn-outline-primary font-size-xs" href="" style="margin-bottom: 5px;">x5000</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<br>

<?php
include_once __DIR__ . '/view/footer.php';
?>