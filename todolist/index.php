<?php
include_once __DIR__ . '/view/header.php';

header('Location: https://gh.g4u.by/todolist/server_list.php');
?>
<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Выбери где зависнешь</h1>
            <p class="lead text-muted">Только тут самые качественные сервера, такие как MU Online, Lineage 2, World of Warcraft</p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="<?= $_SERVER['REQUEST_URI']; ?>server_list.php?game=mu">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQd7IKDHqqGiEWnnqfQD_78-xAeXomSZmvE1w&usqp=CAU" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="" srcset="">
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="<?= $_SERVER['REQUEST_URI']; ?>server_list.php?game=la2">

                            <img src="https://la2-rus.ru/public/common/logo.png" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="" srcset="">
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="<?= $_SERVER['REQUEST_URI']; ?>server_list.php?game=wow">

                            <img src="https://toplogos.ru/images/logo-world-of-warcraft.png" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="" srcset="">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</main>

<?php
include_once __DIR__ . '/view/footer.php';
?>