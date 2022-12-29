<?php

namespace Alura\Armazenamento\Controller;

use Alura\Armazenamento\Helper\HtmlViewTrait;
use Alura\Armazenamento\Entity\Curso;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ObjectRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListaDeCursos implements RequestHandlerInterface
{
    use HtmlViewTrait;

    /** @var EntityRepository<Curso> */
    private EntityRepository $cursosRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->cursosRepository = $entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $cursos = $this->cursosRepository->findBy($request->getQueryParams(), ['descricao' => 'ASC']);
        $titulo = 'Listagem de Cursos';

        $html = $this->getHtmlFromTemplate('cursos/listar.php', compact('cursos', 'titulo'));

        return new Response(200, [], $html);
    }
}
