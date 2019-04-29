<?php

namespace Alura\Armazenamento\Controller\Objeto;

use Alura\Armazenamento\Entity\Local;
use Alura\Armazenamento\Entity\Objeto;
use Alura\Armazenamento\Helper\HtmlViewTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEdicao implements RequestHandlerInterface
{
    use HtmlViewTrait;

    private $locaisRepository;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->locaisRepository = $entityManager->getRepository(Local::class);
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $objeto = $this->entityManager->find(Objeto::class, $request->getQueryParams()['id']);
        $locais = $this->locaisRepository->findBy([], ['descricao' => 'ASC']);

        $titulo = 'Editar Objeto';
        $html = $this->getHtmlFromTemplate('objetos/formulario.php', compact('objeto', 'locais', 'titulo'));

        return new Response(200, [], $html);
    }
}
