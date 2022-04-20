<?php

namespace Tronapi\Address;

use Tronapi\Exception\Error;
use Tronapi\Tronapi;

class Address
{
    private $public_key = '';
    private $private_key = '';

    public function __construct(Tronapi $tronapi, $public_key, $private_key)
    {
        $this->client = $tronapi;
        $this->public_key = $public_key;
        $this->private_key = $private_key;
    }

    public function list()
    {
        $signatureStr = $this->public_key.$this->private_key;
        $signature = strtolower(md5($signatureStr));

        $data = [
          'public_key' => $this->public_key,
          'signature' => $signature,
        ];

        return $this->client->get('address/list', $data);
    }

    public function add($address = null)
    {
        if (!isset($address)) {
            throw new Error('address is required');
        }

        $signatureStr = $this->public_key.$address.$this->private_key;
        $signature = strtolower(md5($signatureStr));

        $data = [
          'public_key' => $this->public_key,
          'address' => $address,
          'signature' => $signature,
        ];

        return $this->client->post('address/add', $data);
    }

    public function generate()
    {
        $signatureStr = $this->public_key.$this->private_key;
        $signature = strtolower(md5($signatureStr));

        $data = [
          'public_key' => $this->public_key,
          'signature' => $signature,
        ];

        return $this->client->post('address/generate', $data);
    }

    public function generate_add()
    {
        $signatureStr = $this->public_key.$this->private_key;
        $signature = strtolower(md5($signatureStr));

        $data = [
          'public_key' => $this->public_key,
          'signature' => $signature,
        ];

        return $this->client->post('address/generate_add', $data);
    }
}
