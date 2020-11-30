<?php

class Database
{
    public function __construct()
    {
        $this->connect = new mysqli("localhost", "bad851", "bidlos1315606", "wrw_game");
    }
}

class ServerInfo extends Database {
    public function ShowServer($name)
    {
        $arr = [];

        $query = $this->connect->query("SELECT * FROM `vote_server`");
        foreach ($query as $v){
            $arr [] = $v;
        }

        return $arr;
    }
}

$ServerInfoClass = new ServerInfo();