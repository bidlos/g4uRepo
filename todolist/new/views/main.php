<?php
include_once __DIR__ . "/../route.php";
include_once __DIR__ . "/templates/header.php";
?>

<div class="container bg-light my-2 my-sm-3 my-lg-4 p-3">
    <div class="col-md-12 mb-4">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4"><img src="../img/logo.png" height="70px" /> YourLegion</h1>
                <p class="lead">Найди свой игровой сервер</p>
            </div>
        </div>
    </div>

    <div class="row my-2 my-sm-3 my-lg-4 p-3">
        <div class="col-md-9">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">VIP СЕРВЕР</h1>
                    <p class="lead">Это модифицированный jumbotron, который занимает все горизонтальное пространство своего родителя.</p>
                <?php print_r(PDO::getAvailableDrivers()) ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <img src="https://img.icons8.com/wired/20/000000/settings.png" /> Кабинет
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">Мои данные</li>
                                <li class="list-group-item">Посещения</li>
                                <li class="list-group-item">Голосования</li>
                                <li class="list-group-item bg-primary">Добавить сервер</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <img src="https://img.icons8.com/wired/20/000000/settings.png" /> Кабинет
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <img src="https://img.icons8.com/wired/20/000000/settings.png" /> Кабинет
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-2 my-sm-3 my-lg-4 p-3">

        <div class="col-md-12">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Much longer nav link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
        </div>
    </div>

</div>

<?php
include_once __DIR__ . "/templates/footer.php";
?>