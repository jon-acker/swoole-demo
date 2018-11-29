<?php
namespace App;

require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$port = 9502;
$server = new \Swoole\Http\Server("localhost", $port);
$kernel = new Kernel('dev', true);

function getVersion(): string
{
    return '4.9';
}

/**
 * @param $response
 * @param Response $symfonyResponse
 */
function copyHeaders(Response $symfonyResponse, \Swoole\Http\Response $response): void
{
    foreach ($symfonyResponse->headers->all() as $name => $value) {
        $response->header($name, $value[0]);
    }
}

print('Starting Swoole ' .  getVersion() . " - HTTP Server on port $port \n");

$server->on('request', function ($request, $response) use ($kernel) {

    $symfonyRequest = Request::create($request->server['request_uri'], $request->server['request_method']);
    $symfonyResponse = $kernel->handle($symfonyRequest);

    copyHeaders($symfonyResponse, $response);

    $response->end($symfonyResponse->getContent());

});

file_put_contents('.pid', posix_getpid());

$server->start();

