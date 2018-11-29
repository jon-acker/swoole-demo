<?php

namespace App\Bridge\Swoole\Client;

use React\Promise\Deferred;
use React\Promise\Promise;

class Dns
{
    public function lookup(string $host): Promise
    {
        $deferred = new Deferred();

        \Swoole\Async::dnsLookup($host, function ($domainName, $ip) use ($deferred) {
            $deferred->resolve($ip);
        });

        return $deferred->promise();
    }
}