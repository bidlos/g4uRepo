<?php

include_once __DIR__ . '/../controller/ServerPage.php';

class ServerPage extends ServerPage_Model
{
    public function SearchForm($post)
    {
        $arr = [
            'version' => $post['version'],
            'rate' => $post['rate']
        ];

        foreach ($this->Search_Controller() as $key => $values){
            echo $values['server_version'] . '<br>';
    }
        return $this->Search_Controller($post);
    }
}

$ServerPageClass = new ServerPage();
