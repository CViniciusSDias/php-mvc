<?php

namespace Alura\Armazenamento\Controller;

use Alura\Armazenamento\Entity\Formacao;
use Alura\Armazenamento\Helper\HtmlViewTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioInsercaoFormacao implements RequestHandlerInterface
{
    use HtmlViewTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $formacao = new Formacao();
        $titulo = 'Cadastrar Formação';
        $html = $this->getHtmlFromTemplate('formacoes/formulario.php', compact('formacao', 'titulo'));

        return new Response(200, [], $html);
    }
}
