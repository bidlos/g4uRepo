<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'function.php';

$html = file_get_contents('https://myfin.by/currency/minsk');

include_once __DIR__ . '/phpQuery-onefile.php';
$doc = phpQuery::newDocument($html);

$data['list'] = array();

$entry = $doc->find('tr td');
foreach ($entry as $row) {
    $data['list'][] = pq($row)->text();
}

$usd = $data['list']['1'];

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
<div class="row">
<div class="col-md-12">
<form action="#" method="GET">
                        <h1 style="position: center;">
                            USD - <?php echo $usd; ?>
                        </h1>
</div>
<div class="col-md-12">
<input type="text" name="cours" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
<?php if (isset($_GET['exchange'])) {
    $sum = $_GET['cours'] * $usd;
    echo '<h1>' . $_GET['cours'] . '$ = ' . $sum . ' р.</h1>';
}?>
</div>
<div class="col-md-12">
<button type="submit" name="exchange" class="btn btn-primary mb-2" style="height: 60px;width: 100%;">Пересчитать</button>
                    </form>
</div>
</div>
</div>


</body>

</html>
