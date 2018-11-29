<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

class View
{

    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $value = $event->getControllerResult();
        $response = new Response($value);

        // ... somehow customize the Response from the return value

        $event->setResponse($response);
    }

}