<?php

namespace Alura\Armazenamento\Controller;

use Alura\Armazenamento\Entity\Local;
use Alura\Armazenamento\Infra\EntityManagerFactory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListaDeLocais implements RequestHandlerInterface
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
        $locais = $this->locaisRepository->findBy($request->getQueryParams(), ['descricao' => 'ASC']);

        $html = $this->getHtmlFromTemplate('locais/listar-locais.php', compact('locais'));

        return new Response(200, [], $html);
    }
}
