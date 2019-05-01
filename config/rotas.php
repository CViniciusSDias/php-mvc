<?php

return [
    '/login' => \Alura\Armazenamento\Controller\FormularioLogin::class,
    '/fazer-login' => \Alura\Armazenamento\Controller\Login::class,
    '/logout' => \Alura\Armazenamento\Controller\Logout::class,
    '/novo-curso' => \Alura\Armazenamento\Controller\FormularioInsercaoCurso::class,
    '/salvar-curso' => \Alura\Armazenamento\Controller\PersistenciaCurso::class,
    '/listar-cursos' => \Alura\Armazenamento\Controller\ListaDeCursos::class,
    '/editar-curso' => \Alura\Armazenamento\Controller\FormularioEdicaoCurso::class,
    '/excluir-curso' => \Alura\Armazenamento\Controller\ExclusaoDeCurso::class,
];