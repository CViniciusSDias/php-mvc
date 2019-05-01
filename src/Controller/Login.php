<?php

namespace Alura\Armazenamento\Controller;

use Alura\Armazenamento\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Login implements RequestHandlerInterface
{
    private $repositorioUsuarios;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /** @var Usuario $usuario */
        $usuario = $this->repositorioUsuarios->findOneBy(['email' => $request->getParsedBody()['email']]);

        $urlParaRedirecionar = '/login';

        if (!is_null($usuario) && $usuario->senhaEstaCorreta($request->getParsedBody()['senha'])) {
            $urlParaRedirecionar = '/listar-cursos';
            $_SESSION['logado'] = true;
        }

        return new Response(302, ['Location' => $urlParaRedirecionar]);
    }
}
