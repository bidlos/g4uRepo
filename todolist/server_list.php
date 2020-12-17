<?php
include_once __DIR__ . '/view/header.php';

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

                    <div class="form-group col-md-5">
                        <form action="server_search.php" method="post">
                            <select class="custom-select" id="inputGroupSelect01" name="version" require>
                                <option selected>Версия сервера...</option>
                                <option value="0.97">0.97</option>
                                <option value="S6">S6</option>
                                <option value="S15">S15</option>
                            </select>
                    </div>
                    <div class="form-group col-md-5">
                        <select class="custom-select" id="inputGroupSelect01" name="rate">
                            <option selected>Выберите рейты сервера...</option>
                            <option value="1">x1</option>
                            <option value="30">x30</option>
                            <option value="100">x100</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <button class="btn btn-primary" name="search">Подобрать</button>
                        </form>
                    </div>


                    <?php
                    if (isset($_POST['search'])) {
                    ?>

                        <div class="col-md-12">
                            <h3 class="display-4">Лови список!</h3>
                            <hr>
                            <table class="table table-sm table-dark">
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





                                    <?php
                                    echo '
                                    <tr>
                                    <th scope="row"><img src="https://img.icons8.com/plasticine/20/000000/gold-medal.png" /></th>
                                    <td><a href="' . $_POST['rate'] . '">Name</a></td>
                                    <td>' . $_POST['version'] . '</td>
                                    <td><a href="' . $_POST['rate'] . '">' . $_POST['rate'] . '</td>
                                    <td>12.23.20</td>
                                </tr>';

                                    ?>
                                </tbody>
                            </table>
                            <a href="" class="btn btn-primary">Заглянуть глубже</a>
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
                                <?php
                                foreach ($ServerInfoClass->ServerTop('server_name', 'server_vote', '5', 'DESC') as $key => $value) {
                                    if ($value['server_status'] >= 0) {
                                        
                                        if($value['server_vote'] >= 100){
                                            echo '
                                            <tr>
                                            <th scope="row"><img src="https://img.icons8.com/plasticine/20/000000/gold-medal.png" /></th>
                                            <td><a href="server_info.php?server=' . $value['server_name'] . '">' . $value['server_title'] . '</a></td>
                                            <td><img src="https://img.icons8.com/color/25/000000/ice-king.png"/></td>
                                            <td>' . $value['server_version'] . '</td>
                                            <td>X' . $value['server_rate'] . '</td>
                                            <td><img src="https://img.icons8.com/plasticine/20/000000/filled-like.png" /> ' . $value['server_vote'] . '</td>
                                            <td><a href="http://' . $value['server_url'] . '" class="float-right" height="20px"><img src="https://img.icons8.com/carbon-copy/30/000000/double-right.png"/></a></td>                                          
                                            </tr>';
                                        }else{
                                            echo '
                                            <tr>
                                            <th scope="row"><img src="https://img.icons8.com/plasticine/20/000000/gold-medal.png" /></th>
                                            <td><a href="server_info.php?server=' . $value['server_name'] . '">' . $value['server_title'] . '</a></td>
                                            <td></td>
                                            <td>' . $value['server_version'] . '</td>
                                            <td>X' . $value['server_rate'] . '</td>
                                            <td><img src="https://img.icons8.com/plasticine/20/000000/filled-like.png" /> ' . $value['server_vote'] . '</td>
                                            <td><a href="http://' . $value['server_url'] . '" class="float-right" height="20px"><img src="https://img.icons8.com/carbon-copy/30/000000/double-right.png"/></a></td>                                          
                                            </tr>';
                                        }
                                        

                                    }
                                }
                                ?>
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
                                    <?php
                                    foreach ($ServerInfoClass->ServerTop('server_name', 'server_vote', 5, 'DESC') as $key => $value) {
                                        if ($value['server_status'] >= 0) {
                                            echo '
                                                <tr>
                                                    <td><a href="server_info.php?server=' . $value['server_name'] . '">' . $value['server_title'] . '</a></td>
                                                    <td>' . $value['server_version'] . '</td>
                                                    <td>X' . $value['server_rate'] . '</td>
                                                    <td>' . $value['server_vote'] . '</td>
                                                    <td><a href="http://' . $value['server_url'] . '" class="float-right" height="20px"><img src="https://img.icons8.com/carbon-copy/20/000000/double-right.png"/></a></td>                                          
                                                </tr>';
                                        }
                                    }
                                    ?>
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
                                    <?php
                                    foreach ($ServerInfoClass->ServerTop('server_name', 'server_open', '5', 'ASC') as $key => $value) {
                                        if ($value['server_status'] >= 0) {
                                            echo '
                                        <tr>
                                        <td><a href="server_info.php?server=' . $value['server_name'] . '">' . $value['server_title'] . '</a></td>
                                        <td>' . $value['server_version'] . '</td>
                                        <td>X' . $value['server_rate'] . '</td>
                                        <td>' . $value['server_open'] . '</td>
                                        <td><a href="http://' . $value['server_url'] . '" class="float-right" height="20px"><img src="https://img.icons8.com/carbon-copy/20/000000/double-right.png"/></a></td>                                          
                                        </tr>';
                                        }
                                    }
                                    ?>
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
                                if ($value['server_status'] == 2) {
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

                    <div class="col-md-12" style="margin-top: 30px;">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
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