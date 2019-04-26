<?php

return [
    '/listar-objetos' => \Alura\Armazenamento\Controller\ListaDeObjetos::class,
    '/novo-local' => \Alura\Armazenamento\Controller\FormularioInsercaoDeLocal::class,
    '/salvar-local' => \Alura\Armazenamento\Controller\PersistenciaDeLocal::class,
    '/listar-locais' => \Alura\Armazenamento\Controller\ListaDeLocais::class,
    '/editar-local' => \Alura\Armazenamento\Controller\FormularioEdicaoDeLocal::class,
];