<?php

namespace Alura\Armazenamento\Controller;

use Alura\Armazenamento\Entity\Formacao;
use Alura\Armazenamento\Helper\HtmlViewTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListaDeFormacoes implements RequestHandlerInterface
{
    use HtmlViewTrait;

    private $repositorioFormacoes;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioFormacoes = $entityManager->getRepository(Formacao::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $formacoes = $this->repositorioFormacoes->findBy($request->getQueryParams(), ['descricao' => 'ASC']);
        $titulo = 'Listagem de Formações';

        $html = $this->getHtmlFromTemplate('formacoes/listar.php', compact('formacoes', 'titulo'));

        return new Response(200, [], $html);
    }
}
