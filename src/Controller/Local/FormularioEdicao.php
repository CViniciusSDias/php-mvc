<?php

namespace Alura\Armazenamento\Controller\Local;

use Alura\Armazenamento\Controller\HtmlViewTrait;
use Alura\Armazenamento\Entity\Local;
use Alura\Armazenamento\Infra\EntityManagerFactory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEdicao implements RequestHandlerInterface
{
    use HtmlViewTrait;

    private $locaisRepository;

    public function __construct()
    {
        $this->locaisRepository = (new EntityManagerFactory())
            ->getEntityManager()
            ->getRepository(Local::class);
    }

    /**
     * Handles a request and produces a response.
     *
     * May call other collaborating code to generate the response.
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $local = $this->locaisRepository->find($request->getQueryParams()['id']);

        $titulo = 'Editar Local';
        $html = $this->getHtmlFromTemplate('locais/formulario.php', compact('local', 'titulo'));

        return new Response(200, [], $html);
    }
}
