<?php

namespace App\EventListener;

use App\HealthChecker\ResultsProcessComplete;

class ResultsListener
{

    /**
     * ResultsListener constructor.
     */
    public function __construct()
    {
    }

    public function onResultsProcessed(ResultsProcessComplete $event)
    {
        var_dump($event);
    }
}