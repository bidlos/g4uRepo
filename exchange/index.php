<?php

use function PHPSTORM_META\type;

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once __DIR__ . '/function.php';

var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body style="background: url(data:image/jpeg;base64,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);">

    <div class="container" style="background-color: white;">
        <div class="row">
            <div class="col-md-12 text-center" style="margin-top: 10%;">
                <form action="#" method="GET">
                    <h3>USD <?= $exchangeClass->showCurrency('usd') . ' - ' . $exchangeClass->showCurrency('usd_sell'); ?>
                        EUR <?= $exchangeClass->showCurrency('eur') . ' - ' . $exchangeClass->showCurrency('eur_sell'); ?>
                        ЗЛОТЫЕ <span class="badge badge-secondary">10</span> <?php echo $exchangeClass->showCurrency('zlot') . ' - ' . $exchangeClass->showCurrency('zlot_sell'); ?></h3>

            </div>
            <div class="col-md-12 text-center" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-md-9">
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01" name="sell">
                                <option selected value="clear" selected>Продам</option>
                                <option value="usd">USD</option>
                                <option value="eur">EUR</option>
                                <option value="zlot">ZLOT</option>
                                <option value="blr">BLR</option>
                            </select>

                            <select class="custom-select" id="inputGroupSelect01" name="buy">
                                <option selected value="clear">Куплю</option>
                                <option value="usd">USD</option>
                                <option value="eur">EUR</option>
                                <option value="zlot">ZLOT</option>
                                <option value="blr">BLR</option>
                            </select>
                            <div class="col-md-8">
                                <input type="text" name="cours" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h3><?php
                            if (isset($_GET['exchange'])) {
                                echo $exchangeClass->exschangeCurrency($_GET['sell'], $_GET['buy'], $_GET['cours']);
                            }
                            ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center" style="margin-top: 50px;">
                <button type="submit" name="exchange" class="btn btn-primary mb-2" style="height: 60px;width: 65%;">Пересчитать</button>
                </form>
            </div>


            <div class="col-md-12 text-center" style="margin-top: 50px;">
                <?= $exchangeClass->listCurrencyDate();
                ?>
            </div>
        </div>
    </div>

</body>

</html>