<?php

$keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
    [
        [
            ['callback_data' => 'data_reg', 'text' => 'Старт']
        ]
    ]
);

$refreshKeyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
    [
        [
            ['callback_data' => 'data_refresh', 'text' => 'Обновить...']
        ]
    ]
);

$searchKeyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
    [
        [
            ['callback_data' => 'data_find', 'text' => 'Найти соперника'],
            ['callback_data' => 'data_addfight', 'text' => 'Оставить заявку']
        ]
    ]
);

$fightKeyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
    [
        [
            ['callback_data' => 'data_gg', 'text' => 'Голова - Голова'],
            ['callback_data' => 'data_gt', 'text' => 'Голова - Тело'],
            ['callback_data' => 'data_gn', 'text' => 'Голова - Ноги']
        ],
        [
            ['callback_data' => 'data_tg', 'text' => 'Тело - Голова'],
            ['callback_data' => 'data_tt', 'text' => 'Тело - Тело'],
            ['callback_data' => 'data_tn', 'text' => 'Тело - Ноги']
        ],
        [
            ['callback_data' => 'data_ng', 'text' => 'Ноги - Голова'],
            ['callback_data' => 'data_nt', 'text' => 'Ноги - Тело'],
            ['callback_data' => 'data_nn', 'text' => 'Ноги - Ноги']
        ]
    ]
);
$Replykeyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([
    ['Магазин'],
    ['Настройки']
], true, true); // true for one-time keyboard