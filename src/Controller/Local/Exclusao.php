<?php

namespace Alura\Armazenamento\Controller\Local;

use Alura\Armazenamento\Entity\Local;
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
        $local = $em->getReference(Local::class, $request->getQueryParams()['id']);
        $em->remove($local);
        $em->flush();

        return new Response(302, ['Location' => '/listar-locais']);
    }
}
