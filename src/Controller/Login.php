<?php

namespace Alura\Armazenamento\Controller;

use Alura\Armazenamento\Entity\Usuario;
use Alura\Armazenamento\Helper\MensagemFlash;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Login implements RequestHandlerInterface
{
    use MensagemFlash;

    private $repositorioUsuarios;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /** @var Usuario $usuario */
        $usuario = $this->repositorioUsuarios->findOneBy(['email' => $request->getParsedBody()['email']]);


        if (is_null($usuario) || !$usuario->senhaEstaCorreta($request->getParsedBody()['senha'])) {
            $this->adicionaMensagemFlash('danger', 'Usuário ou senha inválidos');

            return new Response(302, ['Location' => '/login']);
        }

        $_SESSION['logado'] = true;

        return new Response(302, ['Location' => '/listar-cursos']);
    }
}
