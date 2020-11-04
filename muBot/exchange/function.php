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
    public function getСurrency($currency = FALSE, $getValue)
    {
        $html = file_get_contents('https://myfin.by/currency/minsk');

        $doc = phpQuery::newDocument($html);

        $data['list'] = array();

        $entry = $doc->find('tr td');
        foreach ($entry as $row) {
            $data['list'][] = pq($row)->text();
        }

        $usd = $data['list'][$getValue];

        $sum = $getValue * $usd;

        return $sum;
    }
}

$exchangeClass = new exchange();
