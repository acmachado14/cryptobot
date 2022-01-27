<?php

namespace Angelo\Criptobot\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration([
            $rootDir . '/src'],
            true // modo Desenvolvimento
        );
        $connection = [
            'dbname' => 'cryptobot',
            'user' => 'root',
            'password' => 'cryptobot',
            'host' => 'mysql1',
            'driver' => 'pdo_mysql'
        ];

        return EntityManager::create($connection, $config);
    }

}
