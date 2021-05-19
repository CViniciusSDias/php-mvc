<?php

use Alura\Armazenamento\Infra\EntitymanagerCreator;
use DI\ContainerBuilder;
use Doctrine\ORM\EntityManagerInterface;

$builder = new ContainerBuilder();

$builder->addDefinitions([
    EntityManagerInterface::class => fn () => (new EntitymanagerCreator())->getEntityManager(),
]);

return $builder->build();
