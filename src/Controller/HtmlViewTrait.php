<?php


namespace Alura\Armazenamento\Controller;

trait HtmlViewTrait
{
    public function getHtmlFromTemplate(string $template, array $data): string
    {
        ob_start();
        extract($data);
        require __DIR__ . '/../../view/' . $template;

        return ob_get_clean();
    }
}
