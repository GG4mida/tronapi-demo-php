<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

$publicKey = 'your public key';
$privateKey = 'your private key';

$tronapi = new \Tronapi\Tronapi($publicKey, $privateKey);

// 订单创建

$amount = 100;
$currency = 'CNY'; // CNY or USD
$coinCode = 'FAU'; // FAU or USDT
$orderId = 'your order id';

$transactionData = $tronapi->transaction->create($amount, $currency, $coinCode, $orderId);

var_dump($transactionData);

// 订单查询

$token = 'your transaction token';
$transactionInfo = $tronapi->transaction->query($token);

var_dump($transactionInfo);
