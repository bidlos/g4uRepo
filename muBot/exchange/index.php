<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once __DIR__ . '/function.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="row" style="margin-top: 10%;">
            <div class="col-md-12">
                <form action="#" method="GET">
                    <h3>USD <?php echo $exchangeClass->showCurrency('usd') . ' - ' . $exchangeClass->showCurrency('usd_sell'); ?>
                        EUR <?php echo $exchangeClass->showCurrency('eur') . ' - ' . $exchangeClass->showCurrency('eur_sell'); ?>
                        ЗЛОТЫЕ <span class="badge badge-secondary">10</span> <?php echo $exchangeClass->showCurrency('zlot') . ' - ' . $exchangeClass->showCurrency('zlot_sell'); ?></h3>

            </div>
            <div class="col-md-12" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-md-9">
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01" name="sell">
                                <!-- <option selected>Куплю</option>
                                <option value="1">USD</option>
                                <option value="2">EUR</option>
                                <option value="6">ZLOT</option> -->
                                <option value="blr" selected>BLR</option>
                            </select>

                            <select class="custom-select" id="inputGroupSelect01" name="buy">
                                <option selected>Куплю</option>
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
                            if(isset($_GET['exchange'])){
                                echo $exchangeClass->exschangeCurrency('blr', $_GET['buy'], $_GET['cours']);
                            }
                        ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 50px;">
                <button type="submit" name="exchange" class="btn btn-primary mb-2" style="height: 60px;width: 100%;">Пересчитать</button>
                </form>
            </div>


            <div class="col-md-12" style="margin-top: 50px;">
                <?php $exchangeClass->listCurrencyDate();
                 ?>
            </div>
        </div>
    </div>

</body>

</html>