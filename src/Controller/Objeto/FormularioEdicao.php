<?php

namespace Alura\Armazenamento\Controller\Objeto;

use Alura\Armazenamento\Entity\Local;
use Alura\Armazenamento\Entity\Objeto;
use Alura\Armazenamento\Helper\HtmlViewTrait;
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
        $objeto = (new EntityManagerFactory())
            ->getEntityManager()
            ->find(Objeto::class, $request->getQueryParams()['id']);
        $locais = $this->locaisRepository->findBy([], ['descricao' => 'ASC']);

        $titulo = 'Editar Objeto';
        $html = $this->getHtmlFromTemplate('objetos/formulario.php', compact('objeto', 'locais', 'titulo'));

        return new Response(200, [], $html);
    }
}
