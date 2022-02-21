<?php

namespace Angelo\Criptobot\Entity;

use DateTime;

/**
 * @Entity
 */
class Variation
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private int $id;

    /**
     * @Column(type="float")
    */
    private float $value;

    /**
     * @Column(type="date")
    */
    private DateTime $date;

    /**
     * @ManyToOne(targetEntity="Coin", cascade={"persist"})
    */
    protected $coin;

    public function __construct(
        Coin $coin,
        float $value,
        DateTime $date
    ) {
        $this->coin = $coin;
        $this->value = $value;
        $this->date = $date;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }
}


