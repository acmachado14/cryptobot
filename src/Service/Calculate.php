<?php

namespace Angelo\Criptobot\Service;

use Angelo\Criptobot\Controller\CoinController;
use Angelo\Criptobot\Controller\VariationController;
use Angelo\Criptobot\Entity\Variation;
use Angelo\Criptobot\Handler\VariationHandler;
use Angelo\Criptobot\Service\ApiService;
use DateTime;
use Doctrine\ORM\EntityManager;
use GuzzleHttp\Client;

Class Calculate
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function constantVerify(): void
    {
        $api = new ApiService(new Client);
        $coinController = new CoinController($this->entityManager);
        $coins = $coinController->coins();
        $variationController = new VariationController($this->entityManager);
        while (true) {
            foreach ($coins as $coin){
                $lastValue = round($api->get($coin->getName())['last'], 2);
                $variation = new Variation($coin,$lastValue, new DateTime());
                $variationController->create($variation);
                new VariationHandler($variation);
                echo "valor do BTC as atual: {$lastValue} \n";
            }
            sleep(1800);
        }
    }
}
