<?php
class database
{
    public function __construct($cid)
    {
        $this->connect = new mysqli("localhost", "bad851", "bidlos1315606", "wrw_game");
        $this->cid = $cid;
    }

    public function chechRegistration()
    {
        $query = $this->connect->query("SELECT `chat_id` FROM `tg_user` WHERE `chat_id` = '" . $this->cid . "'");
    }
}

$databaseClass = new database();

class user extends database
{
    public function regUser($name)
    {
        if ($this->readDb($this->cid) != $this->cid) {
            $this->connect->query("INSERT INTO `tg_user` (`chat_id`, `name`, `hp`, `str`, `vit`, `agi`, `ene`, `sword`, `helm`, `glowes`, `armor`, `pants`, `boots`) VALUES ('" . $this->cid . "', '" . $name . "', '100', '10', '10', '10', '10', '0', '0', '0', '0', '0', '0')");
            return 'Регестрация прошла успешно!';
        } else {
            return 'Вы уже зарегестрированны!';
        }
    }
}

$userClass = new user();
