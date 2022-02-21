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
$coins = $coinController->coins();

if (sizeof($coinController->coins()) < 1){
    $BTC = new Coin('BTC');
    $coinController->create($BTC);
}

$calculo = new Calculate($entityManagerFactory->getEntityManager());
$calculo->constantVerify();