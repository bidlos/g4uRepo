<?php

    $path = $_SERVER['PHP_SELF'];
    $file = basename($path, ".php");

    include_once __DIR__ . "/controllers/". $file .".php";
    