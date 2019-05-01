<?php

namespace Alura\Armazenamento\Controller;

use Alura\Armazenamento\Entity\Curso;
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
        $curso = $this->entityManager->getReference(Curso::class, $request->getQueryParams()['id']);
        $this->entityManager->remove($curso);
        $this->entityManager->flush();

        return new Response(302, ['Location' => '/listar-cursos']);
    }
}
