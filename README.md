# Tronapi php client.

这是 `tronapi` 的 `php` 开发包。用于简化商户接入 `tronapi` 的接口服务。

## 链接

- [接口文档](https://doc.tronapi.com)
- [商户登录](https://pro.tronapi.com)

## 安装

1. 安装 [composer](https://getcomposer.org/) 包管理器。
2. 下载该项目源码，然后进入源码根目录，执行：`composer install`，该命令会创建 `vendor` 目录。
3. 项目中引用 `/vendor/autoload.php` 文件。

> 关于 `composser` 的更多信息，请直接谷歌或参考官方说明文档。

## 使用

```php
  require_once dirname(__DIR__).'/vendor/autoload.php';
  $publicKey = 'your public key';
  $privateKey = 'your private key';
  $client = new \Tronapi\Tronapi($publicKey, $privateKey);
```

### 订单

- 订单创建

> 接口文档：https://doc.tronapi.com/api/transaction/create.html

```php
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
```

- 订单查询

> 接口文档：https://doc.tronapi.com/api/transaction/query.html

```php
  $token = 'your transaction token';
  $transactionInfo = $client->transaction->query($token);
  var_dump($transactionInfo);
```

### 账户

- 账户查询

> 接口文档：https://doc.tronapi.com/api/wallet/query.html

```php
  $accountInfo = $client->account->query();
  var_dump($accountInfo);
```

- 提现申请

> 接口文档：https://doc.tronapi.com/api/wallet/withdrawal_create.html

```php
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
```

- 提现查询

> 接口文档：https://doc.tronapi.com/api/wallet/withdrawal_query.html

```php
  $token = 'your withdrawal token';
  $withdrawalInfo = $client->account->withdrawal_query($token);
  var_dump($withdrawalInfo);
```

## 测试

本项目 `example` 目录下包含了接口调用的示例，也可直接运行测试，步骤如下：

1. 下载项目源码，并进入源码根目录
2. `composer install`
3. 修改相关配置信息，主要是 `public key` & `private key`
3. `php example/transaction.php` 或者 `php example/account.php`

## 联系

可通过 [官网](https://doc.tronapi.com) `右下角` 反馈功能和我们取得联系。