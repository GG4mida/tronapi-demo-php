# Tronapi php client.

这是 `tronapi` 的 `php` 开发包。用于简化商户接入 `tronapi` 的接口服务。

## 链接

- [接口文档](https://doc.tronapi.com)
- [商户登录](https://pro.tronapi.com)

## 安装

```bash
$ npm install tronapi-node --save
```

## 使用

```php
const Tronapi = require('tronapi-node');
const client = new Tronapi({
  public_key: 'your public key',
  private_key: 'your private key',
});
```

### 订单

- 订单创建

> 接口文档：https://doc.tronapi.com/api/transaction/create.html

```php
  
```

- 订单查询

> 接口文档：https://doc.tronapi.com/api/transaction/query.html

```php
  
```

### 账户

- 账户查询

> 接口文档：https://doc.tronapi.com/api/wallet/query.html

```php
  
```

- 提现申请

> 接口文档：https://doc.tronapi.com/api/wallet/withdrawal_create.html

```php
  
```

- 提现查询

> 接口文档：https://doc.tronapi.com/api/wallet/withdrawal_query.html

```php
  
```

## 联系

可通过 [官网](https://doc.tronapi.com) `右下角` 反馈功能和我们取得联系。