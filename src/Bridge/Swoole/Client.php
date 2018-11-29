<?php
namespace App\Bridge\Swoole;

use App\Bridge\Swoole\Client\Dns;
use React\Promise\Deferred;
use React\Promise\Promise;



class Client
{
    /**
     * @var Dns
     */
    private $dns;

    /**
     * Client constructor.
     */
    public function __construct(Dns $dns)
    {
        $this->dns = $dns;
    }

    public function get(string $host, string $uri): Promise
    {
        $deferred = new Deferred();

        $handleResponse = function ($cli) use ($deferred) {
            // do something with cli->headers
            $deferred->resolve($cli->body);
        };

        $fetchData = function (string $ip) use ($uri, $handleResponse) {
            $client = new \Swoole\Http\Client($ip, 80);
            $client->get($uri, $handleResponse);
        };

        $this->dns->lookup($host)->then($fetchData);

        return $deferred->promise();
    }
}