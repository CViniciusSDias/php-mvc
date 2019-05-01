<?php

namespace Alura\Armazenamento\Helper;

trait MensagemFlash
{
    private function adicionaMensagemFlash(string $tipo, string $mensagem): void
    {
        $_SESSION['mensagem_flash'] = $mensagem;
        $_SESSION['tipo_mensagem'] = $tipo;
    }
}
