<?php
header('Content-Type: text/html; charset=utf-8');


$a = 1;

if($a == 1){
$sendText = "Проверка КРОН";
file_get_contents('https://api.telegram.org/bot1226757005:AAGAfpj4aPfEEZ1FCho0ScpirWk8aGilrAU/sendMessage?chat_id=415746338&text=' . $sendText);
}
