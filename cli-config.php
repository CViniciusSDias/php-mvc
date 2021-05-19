<?php

use Alura\Armazenamento\Infra\EntitymanagerCreator;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/vendor/autoload.php';

return ConsoleRunner::createHelperSet(
    (new EntitymanagerCreator())->getEntityManager()
);
