<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HealthcheckController
{
    public function healthCheck()
    {
        //    \React\Promise\all([
//        $client->get('www.bbc.co.uk', '/news/'),
//        $client->get('www.google.co.uk', '/'),
//    ])->done(function ($results) use ($response) {
//
//        $text = array_reduce($results, function ($all, $result) {
//            return $all . '-------'. $result;
//        });
//
//        $response->end($text.'bye');
//    });

        return new JsonResponse((object) [
            'name' => 'Jon',
            'age' => '111'
        ]);
    }

    public function nop()
    {
        return new Response();
    }
}

