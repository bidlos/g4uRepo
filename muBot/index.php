<?php
define('TGKEY', '1226757005:AAGAfpj4aPfEEZ1FCho0ScpirWk8aGilrAU');
include_once('tg.class.php');

$body = file_get_contents('php://input');
$arr = json_decode($body, true); 

$tg = new tg(TGKEY);

$tg_id = $arr['message']['chat']['id'];
$rez_kb = array();

$message_text = $arr['message']['text'];
$tg->sendChatAction($tg_id);
$sms_rev='';
	
	switch($message_text){
		case '/start':
			$sms_rev = ' Здравствуйте, Вас приветствует телеграм-бот анонимных вопросов и предложений. 

';
		case '/help':
			$sms_rev .= 'Все, что Вы напишите в этот чат, я сохраню и <b>передам в обезличенной форме</b> ответственным сотрудникам. 

 Сформулируйте Ваш вопрос или предложение и напишите его полность одним сообщением.';
		break;

		case '/start':
			$sms_rev = 'Здравствуйте, Вас приветсвует Простейший Бот Telegram!
';
		case '/help':
			$sms_rev = 'Я могу выполнить следующюю функцию:
			/rev - переворачиваею строку наоборот.
';
			
		break;	

		case '/rev':
			$sms_rev = strrev($message_text);
			
		break;	

		default:
			$sms_rev ='Команда не распознана';
		break;	
	}

$tg->send($tg_id, $sms_rev, $rez_kb);
exit('ok'); // говорим телеге, что все окей
?>