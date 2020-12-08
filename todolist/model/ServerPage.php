<?php

include_once __DIR__ . '/../controller/ServerPage.php';

class ServerPage extends ServerPage_Model
{
    public function show()
    {
        

        echo '
        <form action="" method="post">
        <input type="text" name="row">
        <button name="submit">Submit</button>
        </form>';
        
        if (isset($_POST['submit'])) {
            echo '<strong>' . $this->FunctionName($_POST) . '</strong>';
        }
    }
}

$ServerPageClass = new ServerPage();
