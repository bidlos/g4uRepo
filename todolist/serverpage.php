<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once  __DIR__ . "/model/ServerPage.php";

include_once __DIR__ . '/view/header.php';
?>

<div class="container" style="background: #fff">
    <div class="row">
        <div class="col-md-12">
            <?= $ServerPageClass->show(); ?>
        </div>
    </div>
</div>

<?php

include_once __DIR__ . '/view/footer.php';
?>