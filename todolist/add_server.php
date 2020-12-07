<?php
include_once __DIR__ . '/view/header.php';

// $time = time() + (3600 * 24 * 7);
// echo time() . ' - ' . $time;
?>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="background:#fff;">
        <?= print_r( $ServerInfoClass->addServer($_POST)); ?>
        </div>
    </div>
</div>



<?php
include_once __DIR__ . '/view/footer.php';
?>