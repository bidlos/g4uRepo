<?php
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
//Подключаемся к БД Хост, Имя пользователя MySQL, его пароль, имя нашей базы
$connect = new mysqli("localhost", "bad851", "bidlos1315606", "wrw_game");
//Кодировка данных получаемых из базы
$connect->query("SET NAMES 'utf8' ");