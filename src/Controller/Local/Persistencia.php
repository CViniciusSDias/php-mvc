<?php

namespace Alura\Armazenamento\Controller\Local;

use Alura\Armazenamento\Entity\Local;
use Alura\Armazenamento\Infra\EntityManagerFactory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistencia implements RequestHandlerInterface
{
    /**
     * Handles a request and produces a response.
     *
     * May call other collaborating code to generate the response.
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $local = new Local();
        $local->setDescricao($request->getParsedBody()['descricao']);
        $em = (new EntityManagerFactory())->getEntityManager();

        if (array_key_exists('id', $request->getQueryParams())) {
            $local->setId($request->getQueryParams()['id']);
            $em->merge($local);
        } else {
            $em->persist($local);
        }
        $em->flush();

        return new Response(302, ['Location' => '/listar-locais']);
    }
}
