<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

$publicKey = 'your public key';
$privateKey = 'your private key';

$client = new \Tronapi\Tronapi($publicKey, $privateKey);

/* =====================================================================
账户查询
接口地址：https://doc.tronapi.com/api/wallet/query.html
===================================================================== */

$accountInfo = $client->account->query();

var_dump($accountInfo);

/* =====================================================================
提现申请
接口地址：hhttps://doc.tronapi.com/api/wallet/withdrawal_create.html
===================================================================== */

$amount = 200;
$coinCode = 'FAU';
$address = 'your withdrawal address';
$notifyUrl = 'your withdrawal notify url';
$withdrawalData = $client->account->withdrawal(
  $amount,
  $coinCode,
  $address,
  $notifyUrl
);

var_dump($withdrawalData);

/* =====================================================================
提现查询
接口地址：hhttps://doc.tronapi.com/api/wallet/withdrawal_query.html
===================================================================== */

$token = 'your withdrawal token';
$withdrawalInfo = $client->account->withdrawal_query($token);

var_dump($withdrawalInfo);
