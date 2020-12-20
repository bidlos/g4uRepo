<?php

include_once __DIR__ . '/Database.php';

class ServerPage_Model extends Database_Controller
{
    public function Search_Controller()
    {
        $query = $this->connect->query("SELECT * FROM `vote_server`");
        return $query;
    }
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
}
