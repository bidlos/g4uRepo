<?php
require_once "views/header-small.php";
?>

<div class="container">
    <div class="row masthead">
        <div class="col-md-9">
            <p><h3>ТОП фармеров</h3></p>
        <?php
        $userClass->topthree(4);
        $userClass->topplayer();
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