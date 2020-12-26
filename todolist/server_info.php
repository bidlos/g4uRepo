<?php
include_once  __DIR__ . "/model/ServerPage.php";
include_once __DIR__ . '/view/header.php';
?>

<main role="main" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="container">
        <section class="jumbotron text-center">
            <div class="container">
                <li class="media">
                    <a href="#" class="btn"><img src="<?= $ServerPageClass->ServerPageInfo($_GET['server'])['server_img']; ?>" /></a>

                    <div class="media-body">
                        <h1 class="jumbotron-heading"><?= $ServerPageClass->ServerPageInfo($_GET['server'])['server_name']; ?></h1>
                        <p class="lead text-muted"><?= $ServerPageClass->ServerPageInfo($_GET['server'])['server_title']; ?></p>
                        <p class="lead text-muted"><img src="https://img.icons8.com/plasticine/25/000000/filled-like.png" /> <?= $ServerPageClass->ServerPageInfo($_GET['server'])['server_vote']; ?></p>
                        <form action="server_info.php?server=<?= $ServerPageClass->ServerPageInfo($_GET['server'])['server_name']; ?>" method="post"><button class="btn btn-primary">Голосуй за сервер</button> <a href="http://<?= $ServerPageClass->ServerPageInfo($_GET['server'])['server_url']; ?>" class="btn btn-primary">Перейти на проект</a></form>
                    </div>
                </li>
            </div>


        </section>


        <div class="album py-5 bg-light">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= $_SERVER['HTTP_REFERER']; ?>">Назад</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $_GET['server']; ?></li>
                </ol>
            </nav>
            <div class="container">

                <div class="row">


                    <div class="col-md-12" style="margin-top: 30px;">

                        <ul class="list-unstyled">
                            <li class="media">
                                <img src="<?= $ServerPageClass->ServerPageInfo($_GET['server'])['server_img']; ?>" class="mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1"><?= $ServerPageClass->ServerPageInfo($_GET['server'])['server_title']; ?></h5>
                                    <p><?= nl2br($ServerPageClass->ServerPageInfo($_GET['server'])['server_description']); ?></p>
                                    <br>
                                </div>
                                <a href="' . $value['server_url'] . '" class="btn"><img src="https://img.icons8.com/flat_round/40/000000/right--v1.png" /></a>
                            </li>
                        </ul>
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