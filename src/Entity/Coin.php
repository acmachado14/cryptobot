<?php

namespace Angelo\Criptobot\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Coin
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
    */
    private int $id;

    /**
     * @Column(type="string")
    */
    private string $name;


    /**
     * @OneToMany(targetEntity="Variation", mappedBy="coin")
    */
    private $variations;

    public function __construct(
        string $name
    ) {
        $this->name = $name;
        $this->variations = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addVariation(Variation $variation): void
    {
        $this->variations[$variation->getId()] = $variation;
    }
}
