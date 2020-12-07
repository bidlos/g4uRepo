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
                        <form action="#" method="post">
                            <select class="custom-select" id="inputGroupSelect01" name="version" require>
                                <option value="0" selected>Версия сервера...</option>
                                <option value="0.97">0.97</option>
                                <option value="S6">S6</option>
                                <option value="S15">S15</option>
                            </select>
                    </div>
                    <div class="form-group col-md-5">
                        <select class="custom-select" id="inputGroupSelect01" name="rate">
                            <option value="0" selected>Выберите рейты сервера...</option>
                            <option value="1">x1</option>
                            <option value="30">x30</option>
                            <option value="100">x100</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <button class="btn btn-primary" name="search">Подобрать</button>
                        </form>
                    </div>

                    <!-- Search Filter -->

                    <!-- Result -->
                    <div class="col-md-12" style="margin-top: 30px;">
                        <table class="table table-sm table-hover">
                            <tbody>
                                <?php
                                foreach ($ServerInfoClass->SearchServer($_POST) as $key => $value) {
                                    if ($value['server_status'] >= 0) {
                                        echo '
                                        <tr>
                                        <td><a href="server_info.php?server=' . $value['server_name'] . '">' . $value['server_title'] . '</a></td>
                                        <td>' . $value['server_version'] . '</td>
                                        <td>X' . $value['server_rate'] . '</td>
                                        <td>' . $value['server_open'] . '</td>
                                        <td><a href="http://' . $value['server_url'] . '" class="float-right" height="20px"><img src="https://img.icons8.com/dotty/30/000000/down-right.png"/></a></td>                                          
                                        </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Result -->

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