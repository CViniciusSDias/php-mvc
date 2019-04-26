<?php

namespace Alura\Armazenamento\Controller;

use Alura\Armazenamento\Entity\Objeto;
use Alura\Armazenamento\Infra\EntityManagerFactory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListaDeObjetos implements RequestHandlerInterface
{
    use HtmlViewTrait;

    private $objetosRepository;

    public function __construct()
    {
        $this->objetosRepository = (new EntityManagerFactory())
            ->getEntityManager()
            ->getRepository(Objeto::class);
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
