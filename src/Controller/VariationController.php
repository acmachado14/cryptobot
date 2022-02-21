<?php

namespace Angelo\Criptobot\Controller;

use Angelo\Criptobot\Entity\Variation;
use Doctrine\ORM\EntityManager;

class VariationController
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create(Variation $variation): void
    {
        $this->entityManager->persist($variation);
        $this->entityManager->flush($variation);
    }
}