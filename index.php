<?php

use Angelo\Criptobot\Controller\CoinController;
use Angelo\Criptobot\Entity\Coin;
use Angelo\Criptobot\Entity\Variation;
use Angelo\Criptobot\Helper\EntityManagerFactory;
use Angelo\Criptobot\Service\Calculate;
use Dotenv\Dotenv;

require_once 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$entityManagerFactory = new EntityManagerFactory();

$coinController = new CoinController($entityManagerFactory->getEntityManager());

if (sizeof($coinController->coins()) < 1){
    $coin = new Coin('BTC');
    $coinController->create($coin);
}

$calculo = new Calculate($entityManagerFactory->getEntityManager());
$calculo->constantVerify();