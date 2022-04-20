<?php

namespace Tronapi;

use Tronapi\Exception\Error;
use Tronapi\Account\Account;
use Tronapi\Address\Address;
use Tronapi\Transaction\Transaction;

if (!function_exists('curl_init')) {
    throw new Error('cURL module not installed.');
}

class Tronapi
{
    private $curl;
    private $host = 'https://pro.tronapi.com';

    public function __construct(
      $public_key = '',
      $private_key = ''
    ) {
        if (!isset($public_key)) {
            throw new Error('public key is required');
        }
        if (!isset($private_key)) {
            throw new Error('private key is required');
        }

        $this->curl = curl_init();

        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 30);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($this->curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        $this->account = new Account($this, $public_key, $private_key);
        $this->address = new Address($this, $public_key, $private_key);
        $this->transaction = new Transaction($this, $public_key, $private_key);
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }

    public function setHost($host)
    {
        $this->host = $host;
    }

    public function post($path, $data = null)
    {
        curl_setopt($this->curl, CURLOPT_URL, $this->host.'/api/'.$path);
        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, http_build_query($data));

        $json = $this->_call();

        return $json;
    }

    public function get($path, $params = [])
    {
        curl_setopt($this->curl, CURLOPT_POST, false);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, []);

        $query = http_build_query($params);
        
        curl_setopt($this->curl, CURLOPT_URL, $this->host.'/api/'.$path.'?'.$query);

        $json = $this->_call();

        return $json;
    }

    private function _call()
    {
        $response = curl_exec($this->curl);
        if (curl_error($this->curl)) {
            $info = curl_getinfo($this->curl);
            throw new Error('Call to '.$info['url'].' failed: '.curl_error($this->curl));
        }
        $json = json_decode($response, true);

        return $json;
    }
}
