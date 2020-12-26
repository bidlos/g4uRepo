<?php

include_once __DIR__ . '/../controller/User.php';

class UserPage extends User_Model
{
    public function SearchForm()
    {
        $query = $this->UserServer_Controller();


        foreach ($query as $val) {
            $arr = [
                'server_name' => htmlspecialchars($val['server_name']),
                'server_img' => htmlspecialchars($val['server_img']),
                'server_rate' => htmlspecialchars($val['server_rate'])
            ];
        };

        return $arr;
    }

    function addUser($id, $name, $lastName, $login)
    {
        if ($this->userDB_Controller($id) == FALSE) {
            $this->connect->query("INSERT INTO `vote_server_user`
            (`user_id`, `user_name`, `user_lastname`, `user_login`) 
            VALUES 
            ('" . $id . "','" . $name . "','" . $lastName . "','" . $login . "')");
            return '<h3>Аккаунт создан</h3>';
        } else {
            return '<h3>С возвращением боец</h3>';
        }
    }

    public function checkUserLogin($id)
    {
        return $this->userDB_Controller($id);
    }

    public function testPDO()
    {
        $arr = $this->testPDO_Model();

        return $arr;
    }
}

$UserClass = new UserPage();
