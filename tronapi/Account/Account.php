<?php

namespace Tronapi\Account;

use Tronapi\Exception\Error;
use Tronapi\Tronapi;

class Account
{
    private $public_key = '';
    private $private_key = '';

    public function __construct(Tronapi $tronapi, $public_key, $private_key)
    {
        $this->client = $tronapi;
        $this->public_key = $public_key;
        $this->private_key = $private_key;
    }

    public function query()
    {
        $signatureStr = $this->public_key.$this->private_key;
        $signature = strtolower(md5($signatureStr));

        $data = [
          'public_key' => $this->public_key,
          'signature' => $signature,
        ];

        return $this->client->get('wallet/query', $data);
    }

    public function withdrawal(
      $amount = null,
      $coin_code = null,
      $address = null,
      $notify_url = null
    ) {
        if (!isset($amount)) {
            throw new Error('amount is required');
        }
        if (!isset($coin_code)) {
            throw new Error('coin_code is required');
        }
        if (!isset($address)) {
            throw new Error('address is required');
        }
        $signatureStr = $coin_code.$amount.$address.$notify_url.$this->public_key.$this->private_key;
        $signature = strtolower(md5($signatureStr));

        $data = [
            'amount' => $amount,
            'coin_code' => $coin_code,
            'address' => $address,
            'notify_url' => $notify_url,
            'public_key' => $this->public_key,
            'signature' => $signature,
        ];

        return $this->client->post('wallet/withdrawal', $data);
    }

    public function withdrawal_query($token = null)
    {
        if (!isset($token)) {
            throw new Error('token is required');
        }
        $data = [
          'token' => $token,
        ];

        return $this->client->get('wallet/withdrawal/query', $data);
    }
}
