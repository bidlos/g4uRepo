<?php

include_once __DIR__ . '/Medoo.php';

use Medoo\Medoo;

class Database_Controller
{
    public function __construct()
    {
        $this->connect = new mysqli("localhost", "bad851", "bidlos1315606", "wrw_game");
        // $this->dbConnect = new PDO("mysql:host=localhost;dbname=wrw_game", "bad851", "bidlos1315606");
        $this->medoo = new medoo(array( 'database_type' => 'mysql', 'database_name' => 'wrw_game', 'server' => 'localhost', 'username' => 'bad851', 'password' => 'bidlos1315606' )); 
    }
}
