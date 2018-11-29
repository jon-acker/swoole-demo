<?php

namespace App\HealthChecker;

use Symfony\Component\EventDispatcher\Event;

class ResultsProcessComplete extends Event
{
    /**
     * @var array
     */
    private $results;

    /**
     * ResultsProcessComplete constructor.
     */
    public function __construct(array $results)
    {
        $this->results = $results;
    }
}