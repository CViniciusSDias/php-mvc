<?php

namespace Alura\Armazenamento\Controller\Objeto;

use Alura\Armazenamento\Entity\Objeto;
use Alura\Armazenamento\Infra\EntityManagerFactory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Exclusao implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $em = (new EntityManagerFactory())->getEntityManager();
        $objeto = $em->getReference(Objeto::class, $request->getQueryParams()['id']);
        $em->remove($objeto);
        $em->flush();

        return new Response(302, ['Location' => '/listar-objetos']);
    }
}
