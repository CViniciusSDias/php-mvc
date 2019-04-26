<?php

namespace Alura\Armazenamento\Controller\Local;

use Alura\Armazenamento\Helper\HtmlViewTrait;
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

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $local = $this->locaisRepository->find($request->getQueryParams()['id']);

        $titulo = 'Editar Local';
        $html = $this->getHtmlFromTemplate('locais/formulario.php', compact('local', 'titulo'));

        return new Response(200, [], $html);
    }
}
