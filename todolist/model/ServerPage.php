<?php

include_once __DIR__ . '/../controller/ServerPage.php';

class ServerPage extends ServerPage_Model
{


    public function ModulListServer($row, $num, $sort)
    {
        $query =  $this->ModulListServer_Module($row, $num, $sort);

        foreach ($query as $value) {
            if ($value['server_status'] >= 0) {
                echo '
                    <tr>
                        <td><a href="server_info.php?server=' . $value['server_name'] . '">' . $value['server_title'] . '</a></td>
                        <td>' . $value['server_version'] . '</td>
                        <td>X' . $value['server_rate'] . '</td>
                        <td>' . $value['server_vote'] . '</td>
                        <td><a href="http://' . $value['server_url'] . '" class="float-right" height="20px"><img src="https://img.icons8.com/carbon-copy/20/000000/double-right.png"/></a></td>                                          
                    </tr>';
            }
        }
    }

    public function ModulTop5($row, $num, $sort)
    {
        $query =  $this->ModulListServer_Module($row, $num, $sort);

        foreach ($query as $value) {
            if ($value['server_status'] >= 0) {

                if ($value['server_vote'] >= 100) {
                    echo '
                    <tr>
                    <th scope="row"><img src="https://img.icons8.com/plasticine/20/000000/gold-medal.png" /></th>
                    <td><a href="server_info.php?server=' . $value['server_name'] . '">' . $value['server_title'] . '</a></td>
                    <td><img src="https://img.icons8.com/color/25/000000/ice-king.png"/></td>
                    <td>' . $value['server_version'] . '</td>
                    <td>X' . $value['server_rate'] . '</td>
                    <td><img src="https://img.icons8.com/plasticine/20/000000/filled-like.png" /> ' . $value['server_vote'] . '</td>
                    <td><a href="http://' . $value['server_url'] . '" class="float-right" height="20px"><img src="https://img.icons8.com/carbon-copy/30/000000/double-right.png"/></a></td>                                          
                    </tr>';
                } else {
                    echo '
                    <tr>
                    <th scope="row"><img src="https://img.icons8.com/plasticine/20/000000/gold-medal.png" /></th>
                    <td><a href="server_info.php?server=' . $value['server_name'] . '">' . $value['server_title'] . '</a></td>
                    <td></td>
                    <td>' . $value['server_version'] . '</td>
                    <td>X' . $value['server_rate'] . '</td>
                    <td><img src="https://img.icons8.com/plasticine/20/000000/filled-like.png" /> ' . $value['server_vote'] . '</td>
                    <td><a href="http://' . $value['server_url'] . '" class="float-right" height="20px"><img src="https://img.icons8.com/carbon-copy/30/000000/double-right.png"/></a></td>                                          
                    </tr>';
                }
            }
        }
    }
    public function FunctionName($version, $rate = false)
    {
        $arr = [
            'version' => $version,
            'rate' => $rate
        ];

        $query =  $this->ModulSearch_Module($arr['version'], $arr['rate']);


        foreach ($query as $val) {
            if ($val['server_status'] == 2) {
                echo '
                <tr class="table-dark">
                <th scope="row"><img src="https://img.icons8.com/plasticine/20/000000/gold-medal.png" /> VIP</th>
                <td><a href="server_info.php?server=' . $val['server_name'] . '">' . $val['server_name'] . '</a></td>
                <td>' . $val['server_version'] . '</td>
                <td>X' . $val['server_rate'] . '</td>
                <td>12.23.20</td>
                </tr>';
            } elseif ($val['server_vote'] >= 100) {
                echo '
                <tr class="table-dark">
                <th scope="row"><img src="https://img.icons8.com/ultraviolet/20/000000/plus.png"/> BEST</th>
                <td><a href="server_info.php?server=' . $val['server_name'] . '">' . $val['server_name'] . '</a></td>
                <td>' . $val['server_version'] . '</td>
                <td>X' . $val['server_rate'] . '</td>
                <td>12.23.20</td>
                </tr>';
            } else {
                echo '
                <tr>
                <th scope="row"><img src="https://img.icons8.com/fluent/20/000000/bad-decision.png"/></th>
                <td><a href="server_info.php?server=' . $val['server_name'] . '">' . $val['server_name'] . '</a></td>
                <td>' . $val['server_version'] . '</td>
                <td>X' . $val['server_rate'] . '</td>
                <td>12.23.20</td>
                </tr>';
            }
        }
    }

    public function ListServerButton()
    {
        $query = $this->ListServerButton_Module();

        $arr = $query;
        echo '<div class="form-group col-md-12">';
        foreach ($arr as $val) {
            $arr  = $val['server_version'];

            echo '<a href="?version=' . $arr . '" class="btn btn-primary">' . $arr . '</a>&nbsp ';
        }
        echo '</div>';
    }
    public function topServer()
    {
        if (time() <= 2607602217) {
            foreach ($this->topServer_Model('server_name') as $key => $value) {
                if ($value['server_status'] == 3) {
                    echo '
            <div class="card">
            <h5 class="card-header">ТОП Сервер</h5>
            <div class="card-body">
                <h5 class="card-title"><img src="https://img.icons8.com/doodle/25/000000/crown--v1.png" /> <a href="server_info.php?server=' . $value['server_name'] . '">' . $value['server_name'] . '</a> <img src="https://img.icons8.com/plasticine/25/000000/filled-like.png" /> ' . $value['server_vote'] . '</h5>
                <p class="card-text">' . mb_strimwidth($value['server_description'], 0, 650, "...") . '</p>
                <a href="https://energymu.ru/" class="btn btn-primary">Перейти на сервер</a>
            </div>
            </div>
            ';
                }
            }
        }
    }
    public function ServerPageInfo($name)
    {

        return $this->ServerPageInfo_Model($name);

    }
    public function addServer($post)
    {
        $arr = [
            'server_name' => htmlspecialchars($post['server_name']),
            'server_url' => htmlspecialchars($post['server_url']),
            'server_description' => htmlspecialchars($post['server_description']),
            'server_version' => htmlspecialchars($post['server_version']),
            'server_rate' => htmlspecialchars($post['server_rate']),
            'server_dateopen' => htmlspecialchars($post['server_dateopen']),
            'server_skype' => htmlspecialchars($post['server_skype']),
            'server_telegram' => htmlspecialchars($post['server_telegram']),
            'server_vk' => htmlspecialchars($post['server_vk']),
            'server_email' => htmlspecialchars($post['server_email'])
        ];

        $this->connect->query("
        INSERT INTO `vote_server`
        (`server_name`, `server_url`, `server_open`, `server_description`, `server_title`, `server_rate`, `server_version`, `server_skype`, `server_telegram`, `server_vk`, `server_game`, `server_vote`, `server_img`) 
        VALUES 
        ('" . $arr['server_name'] . "', '" . $arr['server_url'] . "', '" . $arr['server_dateopen'] . "', '" . $arr['server_description'] . "', '" . $arr['server_name'] . "', '" . $arr['server_rate'] . "', '" . $arr['server_version'] . "', '" . $arr['server_skype'] . "', '" . $arr['server_telegram'] . "', '" . $arr['server_vk'] . "', 'muonline', 0, 'https://gh.g4u.by/todolist/img/logo.png')");

        return $arr;
    }
}

$ServerPageClass = new ServerPage();
