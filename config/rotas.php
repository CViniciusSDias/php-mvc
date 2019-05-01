<?php

return [
    '/novo-curso' => \Alura\Armazenamento\Controller\FormularioInsercao::class,
    '/salvar-curso' => \Alura\Armazenamento\Controller\Persistencia::class,
    '/listar-cursos' => \Alura\Armazenamento\Controller\Lista::class,
    '/editar-curso' => \Alura\Armazenamento\Controller\FormularioEdicao::class,
    '/excluir-curso' => \Alura\Armazenamento\Controller\Exclusao::class,
];