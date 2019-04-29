<?php

namespace Alura\Armazenamento\Controller\Objeto;

use Alura\Armazenamento\Entity\Local;
use Alura\Armazenamento\Entity\Objeto;
use Alura\Armazenamento\Infra\EntityManagerFactory;
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
        $post = $request->getParsedBody();
        $objeto = new Objeto($post['descricao'], $post['tamanho'], $post['unidade_medida']);
        /** @var Local $local */
        $local = $this->entityManager->find(Local::class, $post['local_id']);
        $objeto->armazenarEm($local);

        if (array_key_exists('id', $request->getQueryParams())) {
            $objeto->setId($request->getQueryParams()['id']);
            $this->entityManager->merge($objeto);
        } else {
            $this->entityManager->persist($objeto);
        }
        $this->entityManager->flush();

        return new Response(302, ['Location' => '/listar-objetos']);
    }
}
