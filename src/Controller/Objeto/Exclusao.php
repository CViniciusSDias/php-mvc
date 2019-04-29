<?php

namespace Alura\Armazenamento\Controller\Objeto;

use Alura\Armazenamento\Entity\Objeto;
use Alura\Armazenamento\Infra\EntityManagerFactory;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Exclusao implements RequestHandlerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $objeto = $this->entityManager->getReference(Objeto::class, $request->getQueryParams()['id']);
        $this->entityManager->remove($objeto);
        $this->entityManager->flush();

        return new Response(302, ['Location' => '/listar-objetos']);
    }
}
