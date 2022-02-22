<?php

namespace Tronapi\Transaction;

use Tronapi\Exception\Error;
use Tronapi\Tronapi;

class Transaction
{
    private $public_key = '';
    private $private_key = '';

    public function __construct(Tronapi $tronapi, $public_key, $private_key)
    {
        $this->client = $tronapi;

        $this->public_key = $public_key;
        $this->private_key = $private_key;
    }

    public function create(
      $amount = null,
      $currency = null,
      $coin_code = null,
      $order_id = null,
      $customer_id = null,
      $product_name = null,
      $notify_url = null,
      $redirect_url = null
    ) {
        if (!isset($amount)) {
            throw new Error('amount is required');
        }
        if (!isset($currency)) {
            throw new Error('currency is required');
        }
        if (!isset($coin_code)) {
            throw new Error('coin_code is required');
        }
        if (!isset($order_id)) {
            throw new Error('order_id is required');
        }
        $signatureStr = $amount.$currency.$coin_code.$order_id.$product_name.$customer_id.$notify_url.$redirect_url.$this->public_key.$this->private_key;
        $signature = strtolower(md5($signatureStr));

        $data = [
            'amount' => $amount,
            'currency' => $currency,
            'coin_code' => $coin_code,
            'order_id' => $order_id,
            'customer_id' => $customer_id,
            'product_name' => $product_name,
            'notify_url' => $notify_url,
            'redirect_url' => $redirect_url,
            'public_key' => $this->public_key,
            'signature' => $signature,
        ];

        return $this->client->post('transaction/create', $data);
    }

    public function query($token = null)
    {
        if (!isset($token)) {
            throw new Error('token is required');
        }
        $data = [
          'token' => $token,
        ];

        return $this->client->get('transaction/query', $data);
    }
}
