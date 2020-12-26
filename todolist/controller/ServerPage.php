<?php

include_once __DIR__ . '/Database.php';

class ServerPage_Model extends Database_Controller
{

    public function ModulListServer_Module($row, $num, $sort)
    {
        $query = $this->connect->query("SELECT * FROM `vote_server` ORDER BY $row $sort LIMIT $num");
        return $query;
    }
    public function ModulSearch_Module($version, $rate = false)
    {
        $query = $this->connect->query("SELECT * FROM `vote_server` WHERE `server_version` = '" . $version . "'");

        return $query;
    }

    public function ListServerButton_Module()
    {
        $query = $this->connect->query("SELECT DISTINCT `server_version` FROM `vote_server`");

        return $query;
    }
    public function topServer_Model()
    {
        $arr = [];

        $query = $this->connect->query("SELECT * FROM `vote_server`");
        foreach ($query as $v) {
            $arr[] = $v;
        }

        return $arr;
    }
    public function ServerPageInfo_Model($name)
    {

        $query = $this->connect->query("SELECT * FROM `vote_server`");
        foreach ($query as $v) {
            if ($v['server_name'] == $name) {
                return $v;
            }
        }
    }
    
}
