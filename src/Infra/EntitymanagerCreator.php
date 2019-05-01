<?php

namespace Alura\Armazenamento\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntitymanagerCreator
{
    public function getEntityManager(): EntityManagerInterface
    {
        $config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/../Entity'], true);
        $dadosConexao = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite',
        ];

        return EntityManager::create($dadosConexao, $config);
    }
}
