<?php
require_once "views/header.php";

?>

<div class="container">
    <div class="row masthead">
        <div class="col-md-9">
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="assets/img/characters/4f034f8cf8a5d1be8f9df88a86ca079f.png" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Добро пожаловать!</h5>
                            <p class="card-text">Фармите, покупайте фармеров, попадайте в ТОП и выигрывайте призы!</p>
                            <p class="card-text">Приятной игры!</p>

                            <p class="card-text"><small class="text-muted"><a href="shop.php"> Усилить армию через магазин</a></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="list-group">
                <?php $gameMenuClass->rightMenu($_SESSION['id']); ?>

            </div>
        </div>

    </div>
</div>

<?php
require_once "views/footer.php";
?>