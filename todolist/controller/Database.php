<?php

class Database_Controller
{
    public function __construct()
    {
        $this->connect = new mysqli("localhost", "bad851", "bidlos1315606", "wrw_game");
    }
}
