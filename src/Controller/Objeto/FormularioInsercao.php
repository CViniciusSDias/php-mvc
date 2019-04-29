<?php

namespace Alura\Armazenamento\Controller\Objeto;

use Alura\Armazenamento\Entity\Local;
use Alura\Armazenamento\Helper\HtmlViewTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioInsercao implements RequestHandlerInterface
{
    use HtmlViewTrait;

    private $locaisRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->locaisRepository = $entityManager->getRepository(Local::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $locais = $this->locaisRepository->findBy([], ['descricao' => 'ASC']);

        $titulo = 'Cadastrar Objeto';
        $html = $this->getHtmlFromTemplate('objetos/formulario.php', compact('locais', 'titulo'));

        return new Response(200, [], $html);
    }
}
