<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

setlocale(LC_ALL, 'ru_RU');
date_default_timezone_set('Europe/Moscow');
header('Content-type: text/html; charset=utf-8');

include_once __DIR__ . '/phpQuery-onefile.php';
// $doc = phpQuery::newDocument(file_get_contents('https://goszakupki.by/tenders/posted'));

$data['table'] = array();
 
$entry = $doc->find('table.table tr');

 
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
<?php 
foreach ($entry as $row) {
	$row = pq($row);
    $name = $row->find('td:eq(0)')->text();
    $org = $row->find('td:eq(1)')->text();
    $value = $row->find('td:eq(2)')->text();
    $status = $row->find('td:eq(3)')->text();
    $date = $row->find('td:eq(4)')->text();
    echo '<tr>';
    echo $data['table'][$name] = '<td style="width: 40%;">'.$org.'</td><td>'.$value.'</td>'.'</td><td>'.$status.'</td>'.'</td><td>'.$date.'</td>';
    echo '</tr>';
}
?>
</table>
</body>
</html>