<?php
require_once "views/header.php";
?>

<div class="container">
    <div class="row masthead">
        <div class="col-md-9">
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="assets/img/characters/1lvl.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Герой 1 лвл</h5>
                            <p class="card-text">Самый слабый представитель нашего мира</p>
                            <p class="card-text">Добывает 1 крикри в час.</p>

                            <p class="card-text"><small class="text-muted">Усилить армию через магазин</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="list-group">
                <p>Ваш уровень - 1</p>
                <p>Крикри - 45</p>
                <p><?php $gameClass->monsterShop($connect); ?></p>
                <a class="list-group-item list-group-item-action active">МЕНЮ</a>
                <a href="#" class="list-group-item list-group-item-action">Личный кабинет</a>
                <a href="#" class="list-group-item list-group-item-action">Статистика</a>
                <a href="#" class="list-group-item list-group-item-action">Магазин</a>
            </div>
        </div>

    </div>
</div>

<?php
require_once "views/footer.php";
?>