<?php
namespace App\Bridge\Swoole;

use React\Promise\Deferred;
use React\Promise\Promise;

class Client
{
    public function get(string $host, string $uri): Promise
    {
        $deferred = new Deferred();

        $getter = function ($domainName, $ip) use ($deferred, $host, $uri) {

            $client = new \Swoole\Http\Client($ip, 80);

            $client->get($uri, function ($cli) use ($deferred) {
                $deferred->resolve($cli->body);
            });
        };

        \Swoole\Async::dnsLookup($host, $getter);

        return $deferred->promise();
    }

}