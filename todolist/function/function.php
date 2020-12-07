<?php

class Database
{
    public function __construct()
    {
        $this->connect = new mysqli("localhost", "bad851", "bidlos1315606", "wrw_game");
    }
}

class ServerInfo extends Database
{
    public function ShowServer($name)
    {

        $arr = [];

        $query = $this->connect->query("SELECT * FROM `vote_server`");
        foreach ($query as $v) {
            $arr[] = $v;
        }

        return $arr;
    }

    public function ServerPageInfo($name)
    {

        $query = $this->connect->query("SELECT * FROM `vote_server`");
        foreach ($query as $v) {
            if ($v['server_name'] == $name) {
                return $v;
            }
        }
    }

    public function ServerTop($name, $row, $num, $sort)
    {
        $arr = [];

        $query = $this->connect->query("SELECT * FROM `vote_server` ORDER BY $row $sort LIMIT $num");
        foreach ($query as $v) {
            $arr[] = $v;
        }

        return $arr;
    }

    public function SearchServer($post)
    {
        $arr = [];
        $query = $this->connect->query("SELECT * FROM `vote_server`");
        foreach ($query as $v) {
            if ($post['version'] == $v['server_version'] || $post['rate'] == $v['server_rate'])
                $arr[] = $v;
        }

        return $arr;
    }

    public function addServer($post)
    {
        $arr = [
            'server_name' => htmlspecialchars($post['server_name']),
            'server_url' => htmlspecialchars($post['server_url']),
            'server_description' => htmlspecialchars($post['server_description']),
            'server_version' => htmlspecialchars($post['server_version']),
            'server_rate' => htmlspecialchars($post['server_rate']),
            'server_dateopen' => htmlspecialchars($post['server_dateopen']),
            'server_skype' => htmlspecialchars($post['server_skype']),
            'server_telegram' => htmlspecialchars($post['server_telegram']),
            'server_vk' => htmlspecialchars($post['server_vk']),
            'server_email' => htmlspecialchars($post['server_email'])
        ];

        $this->connect->query("
        INSERT INTO `vote_server`
        (`server_name`, `server_url`, `server_open`, `server_description`, `server_title`, `server_rate`, `server_version`, `server_skype`, `server_telegram`, `server_vk`, `server_game`, `server_vote`, `server_img`) 
        VALUES 
        ('" . $arr['server_name'] . "', '" . $arr['server_url'] . "', '" . $arr['server_dateopen'] . "', '" . $arr['server_description'] . "', '" . $arr['server_name'] . "', '" . $arr['server_rate'] . "', '" . $arr['server_version'] . "', '" . $arr['server_skype'] . "', '" . $arr['server_telegram'] . "', '" . $arr['server_vk'] . "', 'muonline', 0, 'https://gh.g4u.by/todolist/img/logo.png')");

        return $arr;
    }
}

$ServerInfoClass = new ServerInfo();
