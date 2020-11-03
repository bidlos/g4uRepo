<?php
require_once "views/header-small.php";
?>

<div class="container">
    <div class="row masthead">
        <div class="col-md-9">
            <?php $gameClass->monsterShop();

            ?>
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