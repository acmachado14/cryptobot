<?php

namespace Angelo\Criptobot\Controller;

use Angelo\Criptobot\Entity\Coin;
use Angelo\Criptobot\Entity\Variation;
use Doctrine\ORM\EntityManager;

class CoinController
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create(Coin $coin): void
    {
        $this->entityManager->persist($coin);
        $this->entityManager->flush($coin);
    }

    public function coins(): array
    {
        return $this->entityManager->getRepository(Coin::class)->findAll();
    }

    public function addVariation(Coin $coin,Variation $variation): void
    {
        $coin = $this->entityManager->getReference(Coin::class, $coin->getId());
        $coin->addVariation($variation);
        $this->entityManager->flush();
    }
}