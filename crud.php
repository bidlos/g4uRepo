<?php
//Подключаемся к БД Хост, Имя пользователя MySQL, его пароль, имя нашей базы
$connect = new mysqli("localhost", "bad851", "bidlos1315606", "wrw_game");
//Кодировка данных получаемых из базы
$connect->query("SET NAMES 'utf8' ");

$select = $connect->query("SELECT * FROM `wrw_user`");

$sum = 0;
foreach ($select as $key) {
    $sum = $key['kri'] + $key['getkri'];
    echo $sum;
    $connect->query("UPDATE `wrw_user` SET `kri` = '" . $sum . "' WHERE `id` = '" . $key['id'] . "'");
}
