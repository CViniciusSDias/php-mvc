<?php

namespace Alura\Armazenamento\Controller\Local;

use Alura\Armazenamento\Helper\HtmlViewTrait;
use Alura\Armazenamento\Entity\Local;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioInsercao implements RequestHandlerInterface
{
    use HtmlViewTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $local = new Local();
        $titulo = 'Cadastrar Local';
        $html = $this->getHtmlFromTemplate('locais/formulario.php', compact('local', 'titulo'));

        return new Response(200, [], $html);
    }
}
