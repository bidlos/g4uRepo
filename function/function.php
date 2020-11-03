<?php
class database
{
    public function __construct()
    {
        $this->connect = new mysqli("localhost", "bad851", "bidlos1315606", "wrw_game");
        $this->sessionLogin = $_SESSION['login'];
        $this->sessionID = $_SESSION['id'];
    }
    // Получение стоимости монстра
    public function monsterPrice($id)
    {
        $price = $this->connect->query("SELECT * FROM `wrw_monster`");
        foreach ($price as $key) {
            if ($id == $key['id']) {
                $price = $key['price'];
            }
        }
        return $price;
    }
    // Получение колличества камней уровня
    public function getLvlStone($id)
    {
        $query = $this->connect->query("SELECT * FROM `wrw_user` WHERE `id` = '" . $id . "'");
        foreach ($query as $key) {
            $new = $key['lvl_stone'];
        }
        return $new;
    }
    // Получение получение уровня пользователя
    public function getLvl($id)
    {
        $query = $this->connect->query("SELECT * FROM `wrw_user` WHERE `id` = '" . $id . "'");
        foreach ($query as $key) {
            $new = $key['lvl'];
        }
        return $new;
    } // Получение получение ID пользователя
    public function getUserID()
    {
        $query = $this->connect->query("SELECT * FROM `wrw_user` WHERE `id` = '" . $this->sessionID . "'");
        foreach ($query as $key) {
            $new = $key['id'];
        }
        return $new;
    }
    // Получение общеего колличества камней
    public function getKriSum($id)
    {
        $query = $this->connect->query("SELECT * FROM `wrw_user` WHERE `id` = '" . $id . "'");
        foreach ($query as $key) {
            $new = $key['kri'];
        }
        return $new;
    }
    // Получение фарма камней в минуту
    public function getFarmKri($id)
    {
        $query = $this->connect->query("SELECT * FROM `wrw_user` WHERE `id` = '" . $id . "'");
        foreach ($query as $key) {
            $new = $key['getkri'];
        }
        return $new;
    }
    // Получение колличества монстров у пользователя
    public function getMonster($id)
    {
        $query1 = $this->connect->query("SELECT * FROM `wrw_usermonster`");
        $sum = 0;
        foreach ($query1 as $key) {
            if ($id == $key['user_id']) {
                $sum++;
            }
        }
        return $sum;
    }
    public function updateStat($table, $name, $sum)
    {

        $this->connect->query("UPDATE $table SET $name = '" . $sum . "' WHERE `user_id` = '" . $_SESSION['id'] . "'");

    }
}
$databaseClass = new database();

class user extends database
{

    // Сколько нужно до след. уровня
    public function need2NextLvl($id)
    {
        $getLvl = $this->getLvl($id);

        $needKriLvl = $getLvl * 2000;
        $needLvlStone = $getLvl * 10;

        return 'Для покупки уровня вам нужно : ' . $needKriLvl . ' Бладстоунов и ' . $needLvlStone . ' Камней Уровня';
    }
    // ТОП 3 пользователей
    public function topthree($h)
    {
        $query = $this->connect->query("SELECT * FROM `wrw_user` ORDER BY `getkri` DESC ");
        $i = 0;

        echo '<div class="container"><div class="row">';
        foreach ($query as $key) {
            $i++;
            if ($i <= 3) {
                echo '<div class="col-md-4" style="background: #fed136;"><br><h3>' . $key['name'] . '</h3><br><h' . $h . '><img src="assets/img/kri-logo.png" style="height:25px;"> ' . $key['getkri'] . '</h' . $h . '> Бладстоун в минуту<br> &nbsp;</div>';
            }
        }
        echo '</div></div><br>';
    }
    // ТОП пользователи
    public function topplayer()
    {
        $query = $this->connect->query("SELECT * FROM `wrw_user` ORDER BY `getkri` DESC ");
        foreach ($query as $key) {
            echo '<br><b>' . $key['name'] . '</b> - Добывает каждую минуту ' . $key['getkri'] . ' Бладстоун <br>';
        }
    }
    // Проверка на доступность данных
    private function checkReg($item, $arg)
    {
        $check = $this->connect->query("SELECT * FROM `wrw_user`");
        foreach ($check as $key) {
            if ($key[$arg] == $item) {
                return true;
            }
        }
    }
    // Регистрация пользователя
    public function registration($name, $email, $pass, $confirmPass, $ref = false)
    {
        $err = [];
        if ($this->checkReg($name, 'name') == $name) {
            $err[] = 'Такой логин существует';
        }
        if ($this->checkReg($email, 'email') == $email) {
            $err[] = 'Такой email существует';
        }
        if (strval($pass) != strval($confirmPass)) {
            $err[] = 'Пароли не совпадают';
        }
        if ($err == false) {
            $this->connect->query("INSERT INTO `wrw_user`(`name`, `password`, `email`, `lvl`, `kri`, `getkri`, `ref`, `lvl_stone`) VALUES ('" . $name . "','" . $pass . "','" . $email . "', 1, 0, 0,'" . $ref . "', 0)");
        }
        print_r($err);
    }
    // Запись данных в сессии
    public function login($login, $pass)
    {
        $join = $this->connect->query("SELECT * FROM `wrw_user`");
        foreach ($join as $key) {
            if ($key['name'] == $login && $key['password'] == $pass) {
                $_SESSION['login'] = $login;
                $_SESSION['id'] = $key['id'];
            }

        }
    }
    // Удаление сессий
    public function loginUnset()
    {
        unset($_SESSION['login']);
        unset($_SESSION['id']);
    }
    // Получение всех рефералов пользователя
    public function userReferals($name)
    {
        $find = $this->connect->query("SELECT * FROM `wrw_user`");
        echo '<h3>Мои рефералы</h3>';
        foreach ($find as $key) {
            if ($key['ref'] == $name) {
                echo '<p>' . $key['name'] . '</p>';
            }
        }
    }
}

$userClass = new user();

class hero extends database
{
    public function userHero()
    {

        $query = $this->connect->query("SELECT * FROM `wrw_hero` WHERE `user_id` = '" . $this->sessionID . "'");
        foreach ($query as $key => $value) {
            echo $value['id'];
        }
    }
    public function heroAddStat($stat)
    {
        $stat = $this->connect->real_escape_string($stat);
        $query = $this->connect->query("UPDATE `wrw_hero` SET `str` = '" . $stat . "' WHERE `user_id` = '" . $_SESSION['id'] . "'");
    }
    public function heroShowStat($stat)
    {
        $query = $this->connect->query("SELECT * FROM `wrw_hero` WHERE `user_id` = '" . $_SESSION['id'] . "'");
        foreach ($query as $key) {
            return $key[$stat];
        }
    }
    public function heroVit()
    {
        $vitAdd = $this->heroShowStat('vit') + 1;

        $sumKri = ($this->heroShowStat('vit') + 1) * 200;

        $minusKri = $this->getKriSum($_SESSION['id']);

        if ($minusKri >= $sumKri) {
            $minus = $minusKri - $sumKri;
            $this->connect->query("UPDATE `wrw_user` SET `kri` = $minus WHERE `id` = '" . $_SESSION['id'] . "'");

            $vitAdd = $this->heroShowStat('vit') + 1;
            $this->updateStat('wrw_hero', 'vit', $vitAdd);

            $vit = ($this->heroShowStat('vit') * 5) + 10;
            $this->updateStat('wrw_hero', 'hp', $vit);
            echo '<meta http-equiv="refresh" content="0.1">';

        } else {
            echo 'Не хватает на апгрейд';
        }

    }
    public function heroStat($stat)
    {

        $vitAdd = $this->heroShowStat($stat) + 1;

        $sumKri = ($this->heroShowStat($stat) + 1) * 200 * 2;

        $minusKri = $this->getKriSum($_SESSION['id']);

        if ($minusKri >= $sumKri) {
            $minus = $minusKri - $sumKri;
            $this->connect->query("UPDATE `wrw_user` SET `kri` = $minus WHERE `id` = '" . $_SESSION['id'] . "'");

            $this->updateStat('wrw_hero', $stat, $vitAdd);

            echo '<meta http-equiv="refresh" content="0.1">';

        } else {
            echo 'Не хватает на апгрейд';
        }

    }
    public function getHero()
    {
        $stat = 0;
        $query = $this->connect->query("SELECT * FROM `wrw_hero`");
        foreach ($query as $value) {
            if ($value['user_id'] == $this->sessionID) {
                $stat = true;
            }
        }
        if ($stat == false) {
            $this->connect->query("INSERT INTO `wrw_hero` (`str`, `vit`, `agi`, `head`, `hend`, `legs`, `body`, `hp`, `user_id`) VALUES (1, 1, 1, 1, 1, 1, 1, 15, '" . $this->sessionID . "')");
        }

    }
}
$heroClass = new hero();

class game extends database
{

    // Вычитание стоимости монстра из баланса пользователя

    public function minusLvlSum($id)
    {
        $getKri = $this->getKriSum($id);
        $getLvlStone = $this->getLvlStone($id);
        $getLvl = $this->getLvl($id);

        $needKriLvl = $getLvl * 2000;
        $needLvlStone = $getLvl * 10;

        if ($getKri >= $needKriLvl && $getLvlStone >= $needLvlStone) {
            $getLvl++;
            $getKri = $getKri - $needKriLvl;
            $getLvlStone = $getLvlStone - $needLvlStone;

            $this->connect->query("UPDATE `wrw_user` SET `kri` = '" . $getKri . "', `lvl_stone` = '" . $getLvlStone . "', `lvl` = '" . $getLvl . "' WHERE `id` = '" . $id . "'");
        } else {

            return $txt = 'У вас не хватает ресурсов для покупки уровня!';
        }
    }
    // Вычитание стоимости монстра из баланса пользователя
    public function minusSum($id)
    {
        $query = $this->connect->query("SELECT `kri` FROM `wrw_user` WHERE `id` = '" . $id . "'");
        $getPrice = $this->monsterPrice($_POST['buy-monster']);
        foreach ($query as $key) {
            $sum = $key['kri'];
            if ($sum >= $getPrice) {
                $sum = $sum - $getPrice;
                $this->buyMonster($id, $_POST['buy-monster']);
                $this->connect->query("UPDATE `wrw_user` SET `kri` = $sum WHERE `id` = '" . $id . "'");
            } else {
                echo 'Не хватает Бладстоун';
            }
        }
    }
    // Вывод списка монстров в магазине
    public function monsterShop()
    {

        $query = $this->connect->query("SELECT * FROM `wrw_monster`");

        $ch = $this->getLvl($_SESSION['id']) * 5;

        foreach ($query as $key) {
            if ($this->getMonster($_SESSION['id']) < $ch) {
                echo '
            <div class="row no-gutters">
            <div class="col-md-4">
                <img src="' . $key['img'] . '" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">' . $key['name'] . '</h5>
                    <p class="card-text">' . $key['description'] . '</p>
                    <p class="card-text">Добывает ' . $key['kri'] . ' Бладстоун в минуту.</p>
                    <p><form method="post" action="#"><input type="hidden" name="buy-monster" value="' . $key['id'] . '"><button type="submit" class="nav-link btn btn-danger" name="buy">КУПИТЬ | ' . $key['price'] . ' Бладстоун</button></form></p>

                </div>
            </div>
        </div>';
            } else {

                echo '
            <div class="row no-gutters">
            <div class="col-md-4">
                <img src="' . $key['img'] . '" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">' . $key['name'] . '</h5>
                    <p class="card-text">' . $key['description'] . '</p>
                    <p class="card-text">Добывает ' . $key['kri'] . ' Бладстоун в минуту.</p>

                    <p>Что бы покупать новых юнитов, вам нужно прокачать ваш уровень!</p>

                </div>
            </div>
        </div>';
            }
        }
    }
    // Получение списка монстров персонажа

    public function userMonster($id)
    {
        $query = $this->connect->query("SELECT * FROM `wrw_usermonster`");
        $queryUser = $this->connect->query("SELECT * FROM `wrw_monster`");
        $sum = 0;

        $arr = [];
        foreach ($query as $key) {
            if ($key['user_id'] == $id) {
                foreach ($queryUser as $value) {
                    if ($key['monster_id'] == $value['id']) {
                        $arr[] = $value['name'];
                        $sum = $sum + $value['kri'];
                    }
                }
            }
        }
        echo '<div class="row">';
        foreach (array_count_values($arr) as $key => $value) {
            echo '<div class="col-md-4">';
            foreach ($queryUser as $k) {
                if ($key == $k['name']) {
                    echo '<img src="' . $k['img'] . '" width="100%"><br>';
                }
            }
            echo '<b>' . $key . '</b> - ' . $value . 'x <br></div>';
        }
        echo '</div><br> Сейчас добыча в 1 минуту составляет ' . $sum . ' Бладстоун';
    }
    // Получаем кол-во фармящихся Бладстоун у пользователя
    public function getKri($id)
    {
        $query = $this->connect->query("SELECT * FROM `wrw_usermonster`");
        $queryUser = $this->connect->query("SELECT * FROM `wrw_monster`");
        $sum = 0;
        foreach ($query as $key) {
            if ($key['user_id'] == $id) {
                foreach ($queryUser as $value) {
                    if ($key['monster_id'] == $value['id']) {
                        $sum = $sum + $value['kri'];
                    }
                }
            }
        }
        return $sum;
    }

    // Обновляем информаци о фарме Бладстоун
    public function updateKri($id)
    {
        $this->connect->query("UPDATE `wrw_user` SET `getkri` = '" . $this->getKri($id) . "' WHERE `id` = '" . $id . "'");
    }
    // Покупка нового монстра
    public function buyMonster($id, $monsterId)
    {
        $buy = $this->connect->query("INSERT INTO `wrw_usermonster`(`user_id`, `monster_id`) VALUES ('" . $id . "','" . $monsterId . "')");
    }
}

$gameClass = new game();

class gameMenu extends database
{

    public function farmLvlStone($id)
    {
        $a = array_fill(1, 3, 'banana');
        $sumLvlStone = $this->getLvlStone($_SESSION['id']);

        if (array_rand($a, 1) == 1) {
            $sumLvlStone++;
            echo '<p><h3>Поздравляем, вы вытащили 1 Камень уровня</h3></P>';
            $this->connect->query("UPDATE `wrw_user` SET `lvl_stone`= '" . $sumLvlStone . "' WHERE `id` = '" . $id . "'");
        }
    }
    public function rightMenu($id)
    {
        $query = $this->connect->query("SELECT * FROM `wrw_user` WHERE `id` = '" . $id . "'");
        foreach ($query as $key => $value) {
            echo '
            <a class="list-group-item list-group-item-action active">МЕНЮ</a>
            <a href="panel" class="list-group-item list-group-item-action">Личный кабинет</a>
            <a href="hero" class="list-group-item list-group-item-action">Герой</a>

            <a href="shop" class="list-group-item list-group-item-action">Магазин</a>
            <a href="top" class="list-group-item list-group-item-action">ТОП 10</a>

            <br>

            <p class="list-group-item list-group-item-action"><img src="assets/img/kri-logo.png" style="height:25px;"> Ваш уровень - ' . $value['lvl'] . '</p>
            <p class="list-group-item list-group-item-action"><img src="assets/img/kri-logo.png" style="height:25px;"> Камни уровня - ' . $value['lvl_stone'] . '</p>
            <p class="list-group-item list-group-item-action"><img src="assets/img/kri-logo.png" style="height:25px;"> Бладстоун - ' . $value['kri'] . '</p>
            <p class="list-group-item list-group-item-action"><img src="assets/img/kri-logo.png" style="height:25px;"> Добыча Бладстоун - ' . $value['getkri'] . '</p>

            ';
        }
        $this->addFirstMonster($_SESSION['id']);
    }
    public function addFirstMonster($id)
    {
        $query = $this->connect->query("SELECT * FROM `wrw_usermonster`");
        foreach ($query as $value) {
            if ($value['user_id'] == $id) {
                $stat = true;
            }
        }
        if ($stat == false) {
            $this->connect->query("INSERT INTO `wrw_usermonster`(`user_id`, `monster_id`) VALUES ('" . $id . "', 1)");
        }
    }
}

$gameMenuClass = new gameMenu();
