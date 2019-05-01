<?php

$builder = new \DI\ContainerBuilder();

$builder->addDefinitions([
    \Doctrine\ORM\EntityManagerInterface::class => function () {
        return (new \Alura\Armazenamento\Infra\EntitymanagerCreator())->getEntityManager();
    },
]);

return $builder->build();