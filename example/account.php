<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

$publicKey = 'your public key';
$privateKey = 'your private key';

$client = new \Tronapi\Tronapi($publicKey, $privateKey);

/* =====================================================================
账户余额查询
接口地址：https://doc.tronapi.com/api/account/balance.html
===================================================================== */

$balanceInfo = $client->account->balance();

var_dump($balanceInfo);
