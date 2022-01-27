<?php

use Angelo\Criptobot\Helper\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once 'vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
