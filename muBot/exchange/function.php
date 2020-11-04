<?php
class database
{
    public function __construct()
    {
        $this->connect = new mysqli("localhost", "bad851", "bidlos1315606", "wrw_game");
    }
}

class exchange extends database
{
    public function getСurrency()
    {
        $html = file_get_contents('https://myfin.by/currency/minsk');

        $doc = phpQuery::newDocument($html);

        $data['list'] = array();

        $entry = $doc->find('tr td');

        foreach ($entry as $row) {
            $data['list'][] = pq($row)->text();
        }

        $usd = $data['list'];


        return $usd;
    }
    public function insertCurrency()
    {
        $arr = $this->getСurrency();

        $this->connect->query("INSERT INTO `ts_exchange`
        (`blr`, `usd`, `eur`, `usd_sell`, `eur_sell`, `zlot`, `zlot_sell`, `update_date`) 
        VALUES 
        ('1','" . $arr[1] . "','" . $arr[6] . "','" . $arr[2] . "','" . $arr[7] . "','" . $arr[16] . "','" . $arr[17] . "', '" . date("d-m-Y") . "')");
    }
    public function showCurrency($value = FALSE)
    {
        $query = $this->connect->query("SELECT * FROM `ts_exchange` ORDER BY `id` DESC");

        foreach ($query as $k) {
            return $k[$value];
        }

        return $k;
    }
    public function listCurrencyDate()
    {
        $query = $this->connect->query("SELECT * FROM `ts_exchange` ORDER BY `id` DESC LIMIT 8");

        foreach ($query as $k) {
            echo '
            <li href="#" class="list-group-item list-group-item-action"><b>Дата</b>: ' . $k['update_date'] . ' 
            <b>USD</b>: ' . $k['usd'] . ' - ' . $k['usd_sell'] . ' 
            <b>EUR</b>: ' . $k['eur'] . ' - ' . $k['eur_sell'] . ' 
            <b>Злотые</b>: ' . $k['zlot'] . ' - ' . $k['zlot_sell'] . '</li>';
        }
    }
    public function exschangeCurrency($sell, $buy, $input)
    {
        $query = $this->connect->query("SELECT $buy FROM `ts_exchange` ORDER BY `id` DESC");
        $new = $query->fetch_row();

        $sum = ((float)$sell + (float)$input) * (float)$new['0'];

        return $sum;
    }
}

$exchangeClass = new exchange();
