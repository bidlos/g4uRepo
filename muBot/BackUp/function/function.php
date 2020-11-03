<?php
class database
{
    public function __construct()
    {
        $this->connect = new mysqli("localhost", "bad851", "bidlos1315606", "wrw_game");
    }

    public function readDb($id)
    {
        $query = $this->connect->query("SELECT * FROM `tg_user` WHERE `chat_id` = '" . $id . "'");
        foreach ($query as $v) {
            return $v['chat_id'];
        }
    }
    public function getStat($id)
    {
    }
    public function registrationUser($id, $name)
    {
        if ($this->readDb($id) != $id) {
            $this->connect->query("INSERT INTO `tg_user` (`chat_id`, `name`, `hp`, `str`, `vit`, `agi`, `ene`, `sword`, `helm`, `glowes`, `armor`, `pants`, `boots`) VALUES ('" . $id . "', '" . $name . "', '100', '10', '10', '10', '10', '0', '0', '0', '0', '0', '0')");
            return 'Регестрация прошла успешно!';
        } else {
            return 'Вы уже зарегестрированны!';
        }
    }
    public function findGame($id)
    {
        $get = $this->connect->query("SELECT * FROM `tg_findGame` WHERE `id_one` = '" . $id . "'");
        $userId = 0;
        foreach ($get as $v) {
            if ($v['id_one'] == $id) {
                $userId = $v['id_one'];
            }
        }

        if ($userId != $id) {
            $this->connect->query("INSERT INTO `tg_findGame` (`id_one`, `status`) VALUES ('" . $id . "', '1')");
            return 'Вы стали в очередь!';
        } else {
            return 'Вы уже встали в очередь';
        }
    }

    public function updateFightStatus($id, $apponent)
    {
        $this->connect->query("UPDATE `tg_findGame` SET `id_two`='" . $apponent . "',`status`= 2 WHERE `id_one` = '" . $id . "'");
    }


    public function showGame($id)
    {
        $get = $this->connect->query("SELECT * FROM `tg_findGame`LIMIT 5");
        $i = 0;

        $array = [];

        foreach ($get as $v) {
            if ($v['id_one'] != $id) {
                $i++;
                $array[] = ['callback_data' => 'data_fight_1' . $v['id_one'], 'text' => $v['id_one']];
            }
        }

        $findKeyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
            [
                $array,
            ]
        );

        return $findKeyboard;
    }
    public function startFight($id, $idtwo)
    {
        $this->connect->query("INSERT INTO `tg_fight` (`id_one`, `status_one`, `id_two`,`status_two` , `status`) VALUES ('" . $id . "', '0', '" . $idtwo . "', '0', '1')");
    }
    public function chechFightStatus($id, $data)
    {
        $get = $this->connect->query("SELECT * FROM `tg_fight`");

        foreach ($get as $v) {
            foreach ($get as $v) {
                if ($v['id_one'] == $id) {
                    $this->connect->query("UPDATE `tg_fight` SET `get_turn_one`='" . $data . "', `status_one` = '1' WHERE `id_one` = '" . $id . "'");
                } elseif ($v['id_two'] == $id) {
                    $this->connect->query("UPDATE `tg_fight` SET `get_turn_two`='" . $data . "', `status_two` = '1' WHERE `id_two` = '" . $id . "'");
                }
            }
        }
    }
    public function answerFight($id)
    {
        $get = $this->connect->query("SELECT * FROM `tg_fight`");
        foreach ($get as $v) {
            if ($v['id_one'] == $id) {
                if ($v['status_one'] == 1 && $v['status_two'] == 1) {
                    $this->connect->query("UPDATE `tg_fight` SET `status_one`='0', `status_two` = '0' WHERE `id_one` = '".$id."' OR `id_two` = '".$id."'");
                    return TRUE;
                }
                return FALSE;
            }
            elseif ($v['id_two'] == $id) {
                if ($v['status_one'] == 1 && $v['status_two'] == 1) {
                    $this->connect->query("UPDATE `tg_fight` SET `status_one`='0', `status_two` = '0' WHERE `id_one` = '".$id."' OR `id_two` = '".$id."'");
                    return TRUE;
                }
                return FALSE;
            }
        }
        
    }
    public function getApponentId($id)
    {
        $get = $this->connect->query("SELECT * FROM `tg_fight`");
        foreach ($get as $v) {
            if ($v['id_one'] == $id) {
                return $v['id_two'];
            } elseif ($v['id_two'] == $id) {
                return $v['id_one'];
            }
        }
    }
}

$databaseClass = new database();
