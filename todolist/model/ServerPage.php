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

        foreach ($this->Search_Controller() as $key => $values) {
            echo $values['server_version'] . '<br>';
        }
        return $this->Search_Controller();
    }

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
            <tr style="background: #fff; color: gray;">
            <th scope="row"><img src="https://img.icons8.com/plasticine/20/000000/gold-medal.png" /> VIP</th>
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
}

$ServerPageClass = new ServerPage();
