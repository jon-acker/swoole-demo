<?php
namespace App\Controller;

use App\HealthChecker\HealthService;
use App\HealthChecker\Targets;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HealthcheckController
{
    public function healthCheck(HealthService $healthService, Targets $targets)
    {
        $healthService->check($targets);
    }

    public function nop()
    {
        return new Response();
    }
}

