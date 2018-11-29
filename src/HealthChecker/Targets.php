<?php

namespace App\HealthChecker;

use App\Bridge\Swoole\Client;
use function React\Promise\all;
use React\Promise\Promise;


class Targets
{

    /**
     * @var string[]
     */
    private $targets = [
        'www.google.co.uk',
        'www.google.com'
    ];

    /**
     * @param Client $client
     * @return Promise
     */
    public function checkUsing(Client $client): Promise
    {
        return all(array_map(function ($uri) use ($client) {
            return $client->get($uri, '/');
        }, $this->targets));
    }
}