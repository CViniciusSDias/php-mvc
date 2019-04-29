<?php

namespace Alura\Armazenamento\Controller\Local;

use Alura\Armazenamento\Entity\Local;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistencia implements RequestHandlerInterface
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
        $local = new Local();
        $local->setDescricao($request->getParsedBody()['descricao']);

        if (array_key_exists('id', $request->getQueryParams())) {
            $local->setId($request->getQueryParams()['id']);
            $this->entityManager->merge($local);
        } else {
            $this->entityManager->persist($local);
        }
        $this->entityManager->flush();

        return new Response(302, ['Location' => '/listar-locais']);
    }
}
