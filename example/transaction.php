<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

$publicKey = 'your public key';
$privateKey = 'your private key';

$client = new \Tronapi\Tronapi($publicKey, $privateKey);

/* =====================================================================
订单创建
接口地址：https://doc.tronapi.com/api/transaction/create.html
===================================================================== */

$amount = 100;
$currency = 'CNY';
$coinCode = 'FAU';
$orderId = 'your order id';
$productName = 'your product name';
$customerId = 'your customer id';
$notifyUrl = 'your notify url';
$redirectUrl = 'your redirect url';

$transactionData = $client->transaction->create(
  $amount,
  $currency,
  $coinCode,
  $orderId,
  $customerId,
  $productName,
  $notifyUrl,
  $redirectUrl
);

var_dump($transactionData);

/* =====================================================================
订单查询
接口地址：https://doc.tronapi.com/api/transaction/query.html
===================================================================== */

$token = 'your transaction token';
$transactionInfo = $client->transaction->query($token);

var_dump($transactionInfo);
