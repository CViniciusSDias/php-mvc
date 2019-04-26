<?php

namespace Alura\Armazenamento\Controller\Objeto;

use Alura\Armazenamento\Entity\Local;
use Alura\Armazenamento\Entity\Objeto;
use Alura\Armazenamento\Infra\EntityManagerFactory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistencia implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $em = (new EntityManagerFactory())->getEntityManager();
        $post = $request->getParsedBody();
        $objeto = new Objeto($post['descricao'], $post['tamanho'], $post['unidade_medida']);
        /** @var Local $local */
        $local = $em->getReference(Local::class, $post['local_id']);
        $objeto->armazenarEm($local);

        $em->persist($objeto);
        $em->flush();

        return new Response(302, ['Location' => '/listar-objetos']);
    }
}
