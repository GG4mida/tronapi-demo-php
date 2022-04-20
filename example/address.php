<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

$publicKey = 'your public key';
$privateKey = 'your private key';

$client = new \Tronapi\Tronapi($publicKey, $privateKey);

/* =====================================================================
地址列表
接口地址：https://doc.tronapi.com/api/address/list.html
===================================================================== */

$addressList = $client->address->list();

var_dump($addressList);

/* =====================================================================
地址配置
接口地址：https://doc.tronapi.com/api/address/add.html
===================================================================== */

$res = $client->address->add('TGeztTUmWpcgHp4BCs1j6fdpa3dsqX8gJs');

var_dump($res);

/* =====================================================================
地址生成
接口地址：https://doc.tronapi.com/api/address/generate.html
===================================================================== */

$addressInfo = $client->address->generate();

var_dump($addressInfo);

/* =====================================================================
地址生成 & 替换
接口地址：https://doc.tronapi.com/api/address/generate_add.html
===================================================================== */

$addressInfo = $client->address->generate_add();

var_dump($addressInfo);