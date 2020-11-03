<?php
require_once 'function.php';

class fights extends database
{
    public function newFight()
    {
        $query = $this->connect->query("SELECT * FROM `wrw_fight`");
        foreach ($query as $key) {
            if ($key['user_id'] == $this->sessionID && $key['status'] == 1) {
                return true;
            }
        }

        $getStat = $this->connect->query("SELECT * FROM `wrw_hero`");
        foreach ($getStat as $key) {
            if ($key['user_id'] == $this->sessionID) {
                $this->connect->query("INSERT INTO `wrw_fight`(`user_id`, `vit`, `str`, `agi`, `status`, `hp`, `bot_hp`) VALUES ('" . $this->sessionID . "', " . $key['vit'] . ",  " . $key['str'] . ", " . $key['agi'] . ", 1, " . $key['hp'] . ", " . $key['hp'] . ")");
            }
        }
    }
    public function getHeroStat($val)
    {
        $query = $this->connect->query("SELECT * FROM `wrw_fight` WHERE `user_id` = '" . $this->sessionID . "' AND `status` = 1");
        foreach ($query as $key) {
            if ($key['status'] == 1) {
                return $key[$val];
            }
        }
    }
    public function fightAction($attack = false, $block = false)
    {
        $punch = $this->minMax($this->getHeroStat('str'));

        $arr = [];

        $arr['uron'] = $punch;
        $arr['attack'] = $attack;
        $arr['block'] = $block;

        return $arr;
    }

    public function randAction()
    {
        $arr = [
            1 => 'голове',
            2 => 'телу',
            3 => 'ногам',
        ];
        return $arr[array_rand($arr)];
    }

    public function minMax($str)
    {
        $min = $str - ($str * 0.3);
        $max = $str + ($str * 0.3);
        $rand = mt_rand($min, $max);
        return $rand;
    }
    // Считаем шанс крита от ловкости персонажа
    // формула = 100 / (х * 0.1) ... 100% крит при 1000 аги
    public function agiChance()
    {
        $stat = $this->getHeroStat('agi');
        if ($stat < 1) {
            $stat = 1;
            $crit = 100 / ((int) $stat * 0.1);
            $rand = mt_rand(1, (int) $crit);
        } else {
            $crit = 100 / ((int) $stat * 0.1);
            $rand = mt_rand(1, (int) $crit);
        }

        return $rand;
    }

    public function fightArray($who)
    {
        $arr = [];

        $get = $who;
        if ($get == 'user') {
            $punch = $this->fightAction($_POST['punch'], $_POST['block']);
            $hp = $this->getHeroStat('hp');
            $status = 2;
            $name = $_SESSION['login'];

            $arr = [
                'punch' => $punch['attack'],
                'block' => $punch['block'],
                'attack' => $this->minMax($this->getHeroStat('str')),
                'hp' => $hp,
                'critChance' => $this->agiChance(),
                'critDmg' => $this->minMax($this->getHeroStat('str')) + $this->minMax($this->getHeroStat('agi')) * 1.5,
                'dodge' => $this->agiChance(),
                'name' => $name,
                'status' => $status,
            ];

        } elseif ($get == 'bot') {
            $punch = $this->fightAction($this->randAction(), $this->randAction());
            $hp = $this->getHeroStat('bot_hp');
            $status = 3;
            $name = 'Bot';

            $arr = [
                'punch' => $punch['attack'],
                'block' => $punch['block'],
                'attack' => $this->minMax($this->getHeroStat('str')),
                'hp' => $hp,
                'critChance' => $this->agiChance(),
                'critDmg' => $this->minMax($this->getHeroStat('str')) + $this->minMax($this->getHeroStat('agi')) * 1.5,
                'dodge' => $this->agiChance(),
                'name' => $name,
                'status' => $status,
            ];
        }

        return $arr;
    }

    public function fightResult($one, $two)
    {
        $user = $this->fightArray($one);
        $bot = $this->fightArray($two);

        if ($one == 'user') {$hp = 'bot_hp';
            $status = 3;} elseif ($one == 'bot') {$hp = 'hp';
            $status = 2;}

        if ($user['hp'] <= 0) {
            if ($one == 'user') {$hp = 'hp';
                $status = 3;} elseif ($one == 'bot') {$hp = 'bot_hp';
                $status = 2;}

            $user['hp'] = 0;
            $userLog = 'DIE';

            if ($status == 2) {
                $str = $this->getHeroStat('str');
                $vit = $this->getHeroStat('vit');
                $agi = $this->getHeroStat('agi');
                $newSum = $this->getKriSum($this->sessionID) + (($str + $vit + $agi) * 50);

                $this->connect->query("UPDATE `wrw_user` SET `kri` = '" . $newSum . "' WHERE `id` = '" . $this->sessionID . "'");

            }

            $this->connect->query("UPDATE `wrw_fight` SET $hp = '" . $user['hp'] . "', `status` = '" . $status . "' WHERE `user_id` = '" . $this->sessionID . "' AND `status` = 1");
            echo '<meta http-equiv="refresh" content="0.1;URL=/hero" />';

        } else {
            if ($user['punch'] != $bot['block'] && $bot['dodge'] != 1) {
                if ($user['critChance'] != 1) {
                    $userLog = $user['attack'];
                    $bot['hp'] -= $user['attack'];
                } elseif ($user['critChance'] == 1) {
                    $userLog = $user['critDmg'];
                    $bot['hp'] -= $user['critDmg'];
                }
            } elseif ($user['block'] != $bot['punch'] && $user['dodge'] == 1) {
                $userLog = 'Dodge attack';
            } elseif ($user['block'] == $bot['punch'] && $user['dodge'] != 1) {
                $userLog = ' Block attack';
            } elseif ($user['punch'] == $bot['block'] && $bot['dodge'] != 1) {
                $userLog = 'Bot block u attack';
            } elseif ($user['punch'] = $bot['block'] && $bot['dodge'] == 1) {
                $userLog = 'Bot dodje u attack';
            }

            $status = 1;
            $this->connect->query("UPDATE `wrw_fight` SET $hp = '" . $bot['hp'] . "' WHERE `user_id` = '" . $this->sessionID . "' AND `status` = '" . $status . "'");
        }

        return '<h5>' . $one . ': ' . $userLog . ' - У противника осталось <span class="badge badge-secondary">' . $bot['hp'] . ' хп</span></h5><br>';

    }
}

$fightsClass = new fights();
