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

    public function balance()
    {
        $signatureStr = $this->public_key.$this->private_key;
        $signature = strtolower(md5($signatureStr));

        $data = [
          'public_key' => $this->public_key,
          'signature' => $signature,
        ];

        return $this->client->get('account/balance', $data);
    }
}
