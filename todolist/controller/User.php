<?php

include_once __DIR__ . '/Database.php';

class User_Model extends Database_Controller
{
    public function UserServer_Controller()
    {
        $query = $this->connect->query("SELECT * FROM `vote_server` WHERE `server_user` = '415746338'");

        return $query;
    }

    function userDB_Controller($id)
    {
        $query = $this->connect->query("SELECT * FROM `vote_server_user`");
        foreach ($query as $val) {
            if ($val['user_id'] == $id) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    public function addUser_Controller($id, $name, $lastName, $login)
    {
        if ($this->userDB_Controller($id) == TRUE) {
            $this->connect->query("INSERT INTO `vote_server_user`
            (`user_id`, `user_name`, `user_lastname`, `user_login`) 
            VALUES 
            ('" . $id . "','" . $name . "','" . $lastName . "','" . $login . "')");
        }
    }
}
