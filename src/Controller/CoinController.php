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

    public function create(Coin $coin): Coin
    {
        $this->entityManager->persist($coin);
        $this->entityManager->flush($coin);
        return $this->entityManager->getReference(Coin::class, $coin->getId());
    }

    public function coins(): array
    {
        return $this->entityManager->getRepository(Coin::class)->findAll();
    }

    public function getCoin(int $id): Coin
    {
        return $this->entityManager->getReference(Coin::class, $id);
    }

}