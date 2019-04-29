<?php

namespace Alura\Armazenamento\Controller\Objeto;

use Alura\Armazenamento\Entity\Objeto;
use Alura\Armazenamento\Helper\HtmlViewTrait;
use Alura\Armazenamento\Infra\EntityManagerFactory;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Lista implements RequestHandlerInterface
{
    use HtmlViewTrait;

    private $objetosRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->objetosRepository = $entityManager->getRepository(Objeto::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $objetoList = $this->objetosRepository
            ->findBy($request->getQueryParams(), ['descricao' => 'ASC']);

        $html = $this->getHtmlFromTemplate(
            'objetos/listar-objetos.php',
            compact('objetoList')
        );
        return new Response(200, [], $html);
    }
}
