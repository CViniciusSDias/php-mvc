<?php

namespace Alura\Armazenamento\Controller;

use Alura\Armazenamento\Entity\Local;
use Alura\Armazenamento\Infra\EntityManagerFactory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class InsercaoLocal implements RequestHandlerInterface
{
    /**
     * Handles a request and produces a response.
     *
     * May call other collaborating code to generate the response.
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $local = new Local($request->getParsedBody()['descricao']);
        $em = (new EntityManagerFactory())->getEntityManager();

        $em->persist($local);
        $em->flush();

        return new Response(302, ['Location' => '/listar-locais']);
    }
}
