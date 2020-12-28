<?php

include_once __DIR__ . '/Medoo.php';

use \Medoo\Medoo;

class Database_Model
{
    public function __construct()
    {
        $this->medoo = new medoo(array( 'database_type' => 'mysql', 'database_name' => 'wrw_game', 'server' => 'localhost', 'username' => 'bad851', 'password' => 'bidlos1315606' )); 
    }
}