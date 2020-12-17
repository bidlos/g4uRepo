<?php

include_once __DIR__ . '/Database.php';

class ServerPage_Model extends Database_Controller
{
    public function Search_Controller()
    {


        $query = $this->connect->query("SELECT * FROM `vote_server`");

        

    }
}
