<?php

$builder = new \DI\ContainerBuilder();

$builder->addDefinitions([
    \Doctrine\ORM\EntityManagerInterface::class => function () {
        return (new \Alura\Armazenamento\Infra\EntityManagerFactory())->getEntityManager();
    },
]);

return $builder->build();