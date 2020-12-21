<?php include_once  __DIR__ . "/../model/ServerPage.php"; ?>
<div class="card mb-12">
    <div class="row no-gutters">
        <div class="col-md-3">
            <div class="p-3 bg-light">
                <img src="https://lh3.googleusercontent.com/proxy/ZT_NLKReSpfvk-NpQmGpZH3xPJM-5UIvi3VVezwJcemIivgmZ980qP1cX-lAiPfN_jqjo2f2xWLma-QVDJmmqmEcutqvlL1AZFJhh-uxAKgz8fwGZRZux0Ym4tNv-BuM" style="width: 200px;" class="card-img" alt="...">

            </div>
        </div>
        <div class="col-md-9">
            <div class="card-body">
                <h5 class="card-title">Аккаунт</h5>
                <p class="card-text"><?= $first_name ?></p>
                <p class="card-text"><?= $last_name ?></p>
                <p class="card-text"><strong> <?= $tg_user['username'] ?></strong></p>
                <p class="card-text">Последняя авторизация <?= date("d-m-Y G:i:s", $tg_user['auth_date']) ?></p>
                
            </div>
        </div>
    </div>
</div>