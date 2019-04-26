<?php

return [
    '/novo-objeto' => \Alura\Armazenamento\Controller\Objeto\FormularioInsercao::class,
    '/salvar-objeto' => \Alura\Armazenamento\Controller\Objeto\Persistencia::class,
    '/listar-objetos' => \Alura\Armazenamento\Controller\Objeto\Lista::class,
    '/novo-local' => \Alura\Armazenamento\Controller\Local\FormularioInsercao::class,
    '/salvar-local' => \Alura\Armazenamento\Controller\Local\Persistencia::class,
    '/listar-locais' => \Alura\Armazenamento\Controller\Local\Lista::class,
    '/editar-local' => \Alura\Armazenamento\Controller\Local\FormularioEdicao::class,
    '/excluir-local' => \Alura\Armazenamento\Controller\Local\Exclusao::class,
];