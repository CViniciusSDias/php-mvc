<?php


namespace Alura\Armazenamento\Helper;

trait HtmlViewTrait
{
    private function getHtmlFromTemplate(string $template, array $data = []): string
    {
        ob_start();
        extract($data);
        require __DIR__ . '/../../view/' . $template;

        return ob_get_clean();
    }
}
