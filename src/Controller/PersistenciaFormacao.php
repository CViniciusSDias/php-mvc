<?php

namespace Alura\Armazenamento\Controller;

use Alura\Armazenamento\Entity\Curso;
use Alura\Armazenamento\Entity\Formacao;
use Alura\Armazenamento\Helper\MensagemFlash;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PersistenciaFormacao implements RequestHandlerInterface
{
    use MensagemFlash;

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
        $formacao = new Formacao();
        $formacao->setDescricao($request->getParsedBody()['descricao']);

        if (array_key_exists('id', $request->getQueryParams())) {
            $formacao->setId($request->getQueryParams()['id']);
            $this->entityManager->merge($formacao);
            $mensagem = 'Formação atualizada com sucesso';
        } else {
            $this->entityManager->persist($formacao);
            $mensagem = 'Formação cadastrada com sucesso';
        }
        $this->entityManager->flush();
        $this->adicionaMensagemFlash('success', $mensagem);

        return new Response(302, ['Location' => '/listar-formacoes']);
    }
}
