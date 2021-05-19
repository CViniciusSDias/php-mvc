<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Nyholm\Psr7\ServerRequest;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoole\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;

$rotas = require __DIR__ . '/../config/rotas.php';
/** @var ContainerInterface $container */
$container = require __DIR__ . '/../config/dependencias.php';
$server = new Server("0.0.0.0", 8080);

$server->on("request", function (Request $request, Response $response) use ($container, $rotas) {
    $path = $request->server['path_info'] ?? '/';

    if ($path === '/') {
        $response->redirect('/listar-cursos');
        return;
    }

    if (!isset($rotas[$path])) {
        $response->setStatusCode(404);
        $response->end();
        return;
    }

    if (session_status() === PHP_SESSION_ACTIVE
        && array_key_exists(session_name(), $request->cookie ?? [])
        && session_id() !== $request->cookie[session_name()]
    ) {
        session_abort();
        session_id($request->cookie[session_name()]);
    }

    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    if (!isset($_SESSION['logado']) && stripos($path, 'login') === false) {
        $_SESSION['tipo_mensagem'] = 'danger';
        $_SESSION['mensagem_flash'] = 'Você não está logado';
        $response->redirect('/login');
        return;
    }

    $controllerClass = $rotas[$path];
    $psr7Request = (new ServerRequest(
        $request->getMethod(),
        $request->server['request_uri'],
        $request->header,
        $request->getData(),
        serverParams: $request->server,
    ))->withQueryParams($request->get ?? [])->withParsedBody($request->post ?? []);

    /** @var RequestHandlerInterface $controllerInstance */
    $controllerInstance = $container->get($controllerClass);
    $psr7Response = $controllerInstance->handle($psr7Request);

    foreach ($psr7Response->getHeaders() as $header => $valores) {
        if ($header === 'Location') {
            $response->redirect($valores[0]);
            return;
        }

        foreach ($valores as $value) {
            $response->header($header, $value);
        }
    }
    $response->end((string) $psr7Response->getBody());
});

$server->start();
