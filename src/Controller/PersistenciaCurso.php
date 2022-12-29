<?php

namespace Alura\Armazenamento\Controller;

use Alura\Armazenamento\Entity\Curso;
use Alura\Armazenamento\Helper\MensagemFlash;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PersistenciaCurso implements RequestHandlerInterface
{
    use MensagemFlash;

    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $curso = new Curso();
        $curso->setDescricao($request->getParsedBody()['descricao']);

        if (array_key_exists('id', $request->getQueryParams())) {
            $curso->setId($request->getQueryParams()['id']);
            $this->entityManager->merge($curso);
            $mensagem = 'Curso atualizado com sucesso';
        } else {
            $this->entityManager->persist($curso);
            $mensagem = 'Curso cadastrado com sucesso';
        }
        $this->entityManager->flush();
        $this->adicionaMensagemFlash('success', $mensagem);

        return new Response(302, ['Location' => '/listar-cursos']);
    }
}
