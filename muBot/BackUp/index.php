<?php
header('Content-Type: text/html; charset=utf-8');
// подрубаем API
require_once("vendor/autoload.php");
require_once("function/function.php");
require_once("function/keyboard.php");

// дебаг
if (true) {
	error_reporting(E_ALL & ~(E_NOTICE | E_USER_NOTICE | E_DEPRECATED));
	ini_set('display_errors', 1);
}

// создаем переменную бота
$token = "1226757005:AAGAfpj4aPfEEZ1FCho0ScpirWk8aGilrAU";
$bot = new \TelegramBot\Api\Client($token, null);








// Кнопки у сообщений
$bot->command("start", function ($message) use ($bot) {
	$bot->sendMessage($message->getChat()->getId(), "🧟‍♂️ Добро пожаловать в кровавое месево! \n
	🦾 Для начала игры нажмите *Старт*!", false, null, null, $GLOBALS['keyboard']);
});
$bot->command("ibutton", function ($message) use ($bot) {
	$bot->sendMessage($message->getChat()->getId(), "тест", false, null, null, $GLOBALS['keyboard']);
});

// Обработка кнопок у сообщений
$bot->on(function ($update) use ($bot, $callback_loc, $find_command, $reg) {
	$callback = $update->getCallbackQuery();
	$message = $callback->getMessage();
	$cid = $message->getChat()->getId();
	$cname = $message->getChat()->getusername();
	$data = $callback->getData();

	$reg = $GLOBALS['databaseClass']->registrationUser($cid, $cname);

	$findGame = $GLOBALS['databaseClass']->findGame($cid);
	$showGame = $GLOBALS['databaseClass']->showGame($cid);



	if ($data == "data_test") {
		$bot->sendMessage($cid, "Приступим?!", null, false, null, $GLOBALS['searchKeyboard']);
		$bot->answerCallbackQuery($callback->getId(), $reg, true);
	}
	if ($data == "data_find") {
		$bot->sendMessage($cid, "Поиск аппонента...", null, false, null, $showGame);
		$bot->answerCallbackQuery($callback->getId());
	}
	if ($data == "data_addfight") {
		$bot->sendMessage($cid, "Ожидаем аппонента...", null, false, null, $GLOBALS['refreshKeyboard']);
		$bot->answerCallbackQuery($callback->getId(), $findGame, true); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
	}
	if ($data == "data_refresh") {
		$bot->sendMessage($cid, "Проверить еще раз...", null, false, null, $GLOBALS['refreshKeyboard']);
		$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
	}

	// Принемаем дуэль и отправляем сообщение
	if (strtok($data, '1') == "data_fight_") {
		$apponentId = mb_substr($data, 12, 13);

		$confirmKeyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
			[
				[
					['callback_data' => 'data_confirm_1' . $cid, 'text' => 'Принять'],
					['callback_data' => 'data_cancel_1' . $cid, 'text' => 'Отклонить']
				]
			]
		);

		$GLOBALS['databaseClass']->updateFightStatus($cid, $apponentId);

		$media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();

		$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://image.freepik.com/free-vector/pixel-art-scene-dragon-fight_150088-25.jpg'));
		$bot->sendMediaGroup($apponentId, $media);

		$bot->sendMessage($apponentId, $cid . ' Бросил тебе вызов', null, false, null, $confirmKeyboard);

		$bot->sendMessage($cid, 'Ожидаем ответа соперника! ' . $apponentId);

		$bot->answerCallbackQuery($callback->getId());
	}
	if (strtok($data, '1') == 'data_confirm_') {
		$apponentId = mb_substr($data, 14);

		$GLOBALS['databaseClass']->startFight($cid, $apponentId);

		$bot->sendMessage($cid, 'Вы приняли вызов от ' . $apponentId);
		$bot->sendMessage($cid, 'Сделайте ваш ход ', null, false, null, $GLOBALS['fightKeyboard']);

		$bot->sendMessage($apponentId, $cid . ' Принял ваш вызов');
		$bot->sendMessage($apponentId, 'Сделайте ваш ход ', null, false, null, $GLOBALS['fightKeyboard']);

		$bot->answerCallbackQuery($callback->getId());
	}
	if (strtok($data, '1') == 'data_cancel_') {
		$apponentId = mb_substr($data, 13);

		$bot->sendMessage($cid, 'Вы отказались от боя с ' . $apponentId);

		$bot->sendMessage($apponentId, $cid . ' Отказался от дуэли');

		$bot->answerCallbackQuery($callback->getId());
	}




	if ($data == "data_gg") {
		if ($GLOBALS['databaseClass']->answerFight($cid) == FALSE) {
			$bot->sendMessage($cid, "⏳ Ждем хода противника.");
			$bot->answerCallbackQuery($callback->getId(), $GLOBALS['databaseClass']->chechFightStatus($cid, $data)); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			if ($GLOBALS['databaseClass']->answerFight($cid) == TRUE) {

				$media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
				$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://wow.g4u.by/muBot/img/gg.jpg'));
				$bot->sendMediaGroup($cid, $media);
				$bot->sendMediaGroup($GLOBALS['databaseClass']->getApponentId($cid), $media);

				$bot->sendMessage($cid, "🪓 Ударили в голову и поставили блок головы!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке

				$bot->sendMessage($GLOBALS['databaseClass']->getApponentId($cid), "🪓 Вам Ударили в голову !", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			}
		}
	}


	
	// if ($data == "data_gg") {
	// 		if ($GLOBALS['databaseClass']->answerFight($cid) == FALSE) {
	// 			$bot->sendMessage($cid, "⏳ Ждем хода противника.");
	// 			$bot->answerCallbackQuery($callback->getId(), $GLOBALS['databaseClass']->chechFightStatus($cid, $data)); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
	// 			if ($GLOBALS['databaseClass']->answerFight($cid) == TRUE) {
	// 				$media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
	// 				$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://wow.g4u.by/muBot/img/gg.jpg'));
	// 				// Same for video
	// 				// $media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaVideo('http://clips.vorwaerts-gmbh.de/VfE_html5.mp4'));
	// 				$bot->sendMediaGroup($cid, $media);					
	// 				$bot->sendMediaGroup($GLOBALS['databaseClass']->getApponentId($cid), $media);

	// 				$bot->sendMessage($cid, "🪓 Ударили в голову и поставили блок головы!", null, false, null, $GLOBALS['fightKeyboard']);
	// 				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке

	// 				$bot->sendMessage($GLOBALS['databaseClass']->getApponentId($cid), "🪓 Вам Ударили в голову !", null, false, null, $GLOBALS['fightKeyboard']);
	// 				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
	// 			}

	// 		}
	// }
	if ($data == "data_gt") {
		if ($GLOBALS['databaseClass']->answerFight($cid) == FALSE) {
			$bot->sendMessage($cid, "⏳ Ждем хода противника.");
			$bot->answerCallbackQuery($callback->getId(), $GLOBALS['databaseClass']->chechFightStatus($cid, $data)); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			if ($GLOBALS['databaseClass']->answerFight($cid) == TRUE) {
				$media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
				$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://wow.g4u.by/muBot/img/ng.jpg'));
				// Same for video
				// $media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaVideo('http://clips.vorwaerts-gmbh.de/VfE_html5.mp4'));
				$bot->sendMediaGroup($cid, $media);
				$bot->sendMediaGroup($GLOBALS['databaseClass']->getApponentId($cid), $media);

				$bot->sendMessage($cid, "🪓 Ударили в голову и поставили блок тела!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке

				$bot->sendMessage($GLOBALS['databaseClass']->getApponentId($cid), "🪓 Вам Ударили в голову!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			}
		}
	}
	if ($data == "data_gn") {
		if ($GLOBALS['databaseClass']->answerFight($cid) == FALSE) {
			$bot->sendMessage($cid, "⏳ Ждем хода противника.");
			$bot->answerCallbackQuery($callback->getId(), $GLOBALS['databaseClass']->chechFightStatus($cid, $data)); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			if ($GLOBALS['databaseClass']->answerFight($cid) == TRUE) {
				$media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
				$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://wow.g4u.by/muBot/img/tg.jpg'));
				// Same for video
				// $media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaVideo('http://clips.vorwaerts-gmbh.de/VfE_html5.mp4'));
				$bot->sendMediaGroup($cid, $media);
				$bot->sendMediaGroup($GLOBALS['databaseClass']->getApponentId($cid), $media);

				$bot->sendMessage($cid, "🪓 Ударили в голову и поставили блок ног!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке

				$bot->sendMessage($GLOBALS['databaseClass']->getApponentId($cid), "🪓 Вам Ударили в голову!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			}
		}
	}
	if ($data == "data_tg") {
		if ($GLOBALS['databaseClass']->answerFight($cid) == FALSE) {
			$bot->sendMessage($cid, "⏳ Ждем хода противника.");
			$bot->answerCallbackQuery($callback->getId(), $GLOBALS['databaseClass']->chechFightStatus($cid, $data)); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			if ($GLOBALS['databaseClass']->answerFight($cid) == TRUE) {
				$media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
				$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://wow.g4u.by/muBot/img/gg.jpg'));
				// Same for video
				// $media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaVideo('http://clips.vorwaerts-gmbh.de/VfE_html5.mp4'));
				$bot->sendMediaGroup($cid, $media);
				$bot->sendMediaGroup($GLOBALS['databaseClass']->getApponentId($cid), $media);

				$bot->sendMessage($cid, "🪓 Ударили в тело и поставили блок головы!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке

				$bot->sendMessage($GLOBALS['databaseClass']->getApponentId($cid), "🪓 Вам Ударили в тело!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			}
		}
	}
	if ($data == "data_tt") {
		if ($GLOBALS['databaseClass']->answerFight($cid) == FALSE) {
			$bot->sendMessage($cid, "⏳ Ждем хода противника.");
			$bot->answerCallbackQuery($callback->getId(), $GLOBALS['databaseClass']->chechFightStatus($cid, $data)); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			if ($GLOBALS['databaseClass']->answerFight($cid) == TRUE) {
				$media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
				$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://wow.g4u.by/muBot/img/ng.jpg'));
				// Same for video
				// $media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaVideo('http://clips.vorwaerts-gmbh.de/VfE_html5.mp4'));
				$bot->sendMediaGroup($cid, $media);
				$bot->sendMediaGroup($GLOBALS['databaseClass']->getApponentId($cid), $media);

				$bot->sendMessage($cid, "🪓 Ударили в тело и поставили блок тела!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке

				$bot->sendMessage($GLOBALS['databaseClass']->getApponentId($cid), "🪓 Вам Ударили в тело!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			}
		}
	}
	if ($data == "data_tn") {
		if ($GLOBALS['databaseClass']->answerFight($cid) == FALSE) {
			$bot->sendMessage($cid, "⏳ Ждем хода противника.");
			$bot->answerCallbackQuery($callback->getId(), $GLOBALS['databaseClass']->chechFightStatus($cid, $data)); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			if ($GLOBALS['databaseClass']->answerFight($cid) == TRUE) {
				$media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
				$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://wow.g4u.by/muBot/img/tg.jpg'));
				// Same for video
				// $media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaVideo('http://clips.vorwaerts-gmbh.de/VfE_html5.mp4'));
				$bot->sendMediaGroup($cid, $media);
				$bot->sendMediaGroup($GLOBALS['databaseClass']->getApponentId($cid), $media);

				$bot->sendMessage($cid, "🪓 Ударили в тело и поставили блок ног!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке

				$bot->sendMessage($GLOBALS['databaseClass']->getApponentId($cid), "🪓 Вам Ударили в тело!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			}
		}
	}
	if ($data == "data_ng") {
		if ($GLOBALS['databaseClass']->answerFight($cid) == FALSE) {
			$bot->sendMessage($cid, "⏳ Ждем хода противника.");
			$bot->answerCallbackQuery($callback->getId(), $GLOBALS['databaseClass']->chechFightStatus($cid, $data)); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			if ($GLOBALS['databaseClass']->answerFight($cid) == TRUE) {
				$media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
				$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://wow.g4u.by/muBot/img/gg.jpg'));
				// Same for video
				// $media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaVideo('http://clips.vorwaerts-gmbh.de/VfE_html5.mp4'));
				$bot->sendMediaGroup($cid, $media);
				$bot->sendMediaGroup($GLOBALS['databaseClass']->getApponentId($cid), $media);

				$bot->sendMessage($cid, "🪓 Ударили по ногам и поставили блок головы!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке

				$bot->sendMessage($GLOBALS['databaseClass']->getApponentId($cid), "🪓 Вам Ударили по ногам!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			}
		}
	}
	if ($data == "data_nt") {
		if ($GLOBALS['databaseClass']->answerFight($cid) == FALSE) {
			$bot->sendMessage($cid, "⏳ Ждем хода противника.");
			$bot->answerCallbackQuery($callback->getId(), $GLOBALS['databaseClass']->chechFightStatus($cid, $data)); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			if ($GLOBALS['databaseClass']->answerFight($cid) == TRUE) {
				$media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
				$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://wow.g4u.by/muBot/img/ng.jpg'));
				// Same for video
				// $media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaVideo('http://clips.vorwaerts-gmbh.de/VfE_html5.mp4'));
				$bot->sendMediaGroup($cid, $media);
				$bot->sendMediaGroup($GLOBALS['databaseClass']->getApponentId($cid), $media);

				$bot->sendMessage($cid, "🪓 Ударили по ногам и поставили блок тела!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке

				$bot->sendMessage($GLOBALS['databaseClass']->getApponentId($cid), "🪓 Вам Ударили по ногам!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			}
		}
	}
	if ($data == "data_nn") {
		if ($GLOBALS['databaseClass']->answerFight($cid) == FALSE) {
			$bot->sendMessage($cid, "⏳ Ждем хода противника.");
			$bot->answerCallbackQuery($callback->getId(), $GLOBALS['databaseClass']->chechFightStatus($cid, $data)); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			if ($GLOBALS['databaseClass']->answerFight($cid) == TRUE) {
				$media = new \TelegramBot\Api\Types\InputMedia\ArrayOfInputMedia();
				$media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaPhoto('https://wow.g4u.by/muBot/img/tg.jpg'));
				// Same for video
				// $media->addItem(new TelegramBot\Api\Types\InputMedia\InputMediaVideo('http://clips.vorwaerts-gmbh.de/VfE_html5.mp4'));
				$bot->sendMediaGroup($cid, $media);
				$bot->sendMediaGroup($GLOBALS['databaseClass']->getApponentId($cid), $media);

				$bot->sendMessage($cid, "🪓 Ударили по ногам и поставили блок ног!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке

				$bot->sendMessage($GLOBALS['databaseClass']->getApponentId($cid), "🪓 Вам Ударили по ногам!", null, false, null, $GLOBALS['fightKeyboard']);
				$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
			}
		}
	}










	// if ($data == "data_gt") {
	// 	$bot->sendMessage($cid, "🪓 Ударили в голову и поставили блок тела! \n ⏳ Ждем хода противника.", null, false, null, $GLOBALS['fightKeyboard']);
	// 	$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
	// }
	// if ($data == "data_gn") {
	// 	$bot->sendMessage($cid, "🪓 Ударили в голову и поставили блок ног! \n ⏳ Ждем хода противника.", null, false, null, $GLOBALS['fightKeyboard']);
	// 	$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
	// }
	// if ($data == "data_tg") {
	// 	$bot->sendMessage($cid, "🪓 Ударили в тело и поставили блок головы! \n ⏳ Ждем хода противника.", null, false, null, $GLOBALS['fightKeyboard']);
	// 	$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
	// }
	// if ($data == "data_tt") {
	// 	$bot->sendMessage($cid, "🪓 Ударили в тело и поставили блок тела! \n ⏳ Ждем хода противника.", null, false, null, $GLOBALS['fightKeyboard']);
	// 	$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
	// }
	// if ($data == "data_tn") {
	// 	$bot->sendMessage($cid, "🪓 Ударили в тело и поставили блок ног! \n ⏳ Ждем хода противника.", null, false, null, $GLOBALS['fightKeyboard']);
	// 	$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
	// }
	// if ($data == "data_ng") {
	// 	$bot->sendMessage($cid, "🪓 Ударили по ногам и поставили блок головы! \n ⏳ Ждем хода противника.", null, false, null, $GLOBALS['fightKeyboard']);
	// 	$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
	// }
	// if ($data == "data_nt") {
	// 	$bot->sendMessage($cid, "🪓 Ударили по ногам и поставили блок тела! \n ⏳ Ждем хода противника.", null, false, null, $GLOBALS['fightKeyboard']);
	// 	$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
	// }
	// if ($data == "data_nn") {
	// 	$bot->sendMessage($cid, "🪓 Ударили по ногам и поставили блок ног! \n ⏳ Ждем хода противника.", null, false, null, $GLOBALS['fightKeyboard']);
	// 	$bot->answerCallbackQuery($callback->getId()); // можно отослать пустое, чтобы просто убрать "часики" на кнопке
	// }
}, function ($update) {
	$callback = $update->getCallbackQuery();
	if (is_null($callback) || !strlen($callback->getData()))
		return false;
	return true;
});

$bot->on(function ($Update) use ($bot) {

	$message = $Update->getMessage();
	$mtext = $message->getText();
	$cid = $message->getChat()->getId();

	if (mb_stripos($mtext, "власть советам") !== false) {
		$bot->sendMessage($message->getChat()->getId(), "Смерть богатым!");
	}
	if (mb_stripos($mtext, "test") !== false) {
		$bot->sendMessage($message->getChat()->getId(), "Смерть богатым!", null, false, null, $GLOBALS['Replykeyboard']);
	}
	if (mb_stripos($mtext, "Магазин") !== false) {

		$bot->sendMessage($message->getChat()->getId(), "Смерть богатым!", null, false, null, $GLOBALS['Replykeyboard']);
	} else {
		$bot->sendMessage($message->getChat()->getId(), "Нету такой комманды " . $message->getChat()->getusername() . ' ' . $GLOBALS['databaseClass']->readDb($cid), false, null, null, $GLOBALS['keyboard']);
	}
}, function ($message) use ($name) {
	return true; // когда тут true - команда проходит
});


// запускаем обработку

$bot->run();

print_r($databaseClass->showGame($cid));



$txt = NULL;
echo gettype($txt);
