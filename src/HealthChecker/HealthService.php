<?php

namespace App\HealthChecker;

use App\Bridge\Swoole\Client;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class HealthService
{

    /**
     * @var Client
     */
    private $client;

    /**
     * @var EventDispatcher
     */
    private $dispatcher;

    /**
     * HealthService constructor.
     * @param EventDispatcherInterface $dispatcher
     * @param Client $client
     */
    public function __construct(EventDispatcherInterface $dispatcher, Client $client)
    {
        $this->dispatcher = $dispatcher;
        $this->client = $client;
    }

    public function check(Targets $targets)
    {
        $dispatchResults = function ($results)  {
            $this->dispatcher->dispatch('results.processed', new ResultsProcessComplete($results));
        };

        $targets
            ->checkUsing($this->client)
            ->then($dispatchResults);
    }
}