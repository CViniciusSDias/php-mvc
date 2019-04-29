<?php

namespace Alura\Armazenamento\Controller\Local;

use Alura\Armazenamento\Helper\HtmlViewTrait;
use Alura\Armazenamento\Entity\Local;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEdicao implements RequestHandlerInterface
{
    use HtmlViewTrait;


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
        $local = $this->entityManager->find(Local::class, $request->getQueryParams()['id']);

        $titulo = 'Editar Local';
        $html = $this->getHtmlFromTemplate('locais/formulario.php', compact('local', 'titulo'));

        return new Response(200, [], $html);
    }
}
