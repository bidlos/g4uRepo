<?php
require_once "views/header-small.php";
if (isset($_POST['submitBuyLvl'])) {
    echo $gameClass->minusLvlSum($_SESSION['id']);
}
?>

<div class="container">
    <div class="row masthead">
        <div class="col-md-9">
            <div class="row">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Моя армия</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Рефералка</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Добыча Камней LVL</a>
                        <!--    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Настройки</a> -->
                    </div>
                </div>
                <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <h3>Бессмертные войны</h3>
                            <?php
                            $gameClass->userMonster($_SESSION['id']);
                            ?>
                        </div>
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <h3>Ваша реферальная ссылка:</h3>
                            <a href="https://wow.g4u.by/login?ref=<?= $_SESSION['login']; ?>">https://wow.g4u.by/login?ref=<?= $_SESSION['login']; ?></a>
                            <p>Приглашая рефералов вы ускорите ваш прогресс. За каждого приглашенного реферала вы получите бесплатно юнита *Рефералус*</p>
                            <?= $userClass->userReferals($_SESSION['login']); ?>
                        </div>
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">

                            <p>Шанс удачного дропа составляет 33.3333%</p>
                            <p>
                                <form method="post" action="#">
                                    <?php
                                    $first = mt_rand(1, 20);
                                    $third = mt_rand(1, 20);

                                    $get = $first + $third;

                                    ?>
                                    <input type="text" name="caphaAnswer" class="form-control col-md-6" value="<?= $get ?>" hidden>

                                    <input type="text" name="capha" class="form-control col-md-6" placeholder="<?= $first . '+' . $third; ?>">

                                    <br>
                                    <button type="submit" class="nav-link btn btn-danger" name="submitLvlStone">Выйграть камень уровня</button>
                                </form>
                                <?php



                                if (isset($_POST['submitLvlStone']) && $_POST['caphaAnswer'] == $_POST['capha']) {
                                    $gameMenuClass->farmLvlStone($_SESSION['id']);
                                }
                                ?>
                            </p>
                            <h3>Купить Уровень</h3>
                            <p>
                                <form method="post" action="#"><button type="submit" class="nav-link btn btn-warning" name="submitBuyLvl">Купить Уровень</button></form>
                            </p>
                            <p><?= $userClass->need2NextLvl($_SESSION['id']); ?></p>
                        </div>
                        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
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