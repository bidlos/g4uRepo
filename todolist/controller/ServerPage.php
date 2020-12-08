<?php

include_once __DIR__ . '/Database.php';

class ServerPage_Model extends Database_Controller
{
    public function FunctionName($post)
    {
        if ($post['row'] == 'Tanya') {
            return $post['row'];
        } else {
            return 'bad';
        }
    }
}
