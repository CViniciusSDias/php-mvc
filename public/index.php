<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Server\RequestHandlerInterface;

require __DIR__ . '/../vendor/autoload.php';

$path = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../config/rotas.php';

if (!isset($rotas[$path])) {
    http_response_code(404);
    exit();
}

$controllerClass = $rotas[$path];

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$serverRequest = $creator->fromGlobals();

/** @var RequestHandlerInterface $controllerInstance */
$controllerInstance = new $controllerClass();

$response = $controllerInstance->handle($serverRequest);

foreach ($response->getHeaders() as $header => $valores) {
    foreach ($valores as $value) {
        header(sprintf('%s: %s', $header, $value), false);
    }
}
echo $response->getBody();
