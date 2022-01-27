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
     * @ManyToOne(targetEntity="Coin")
     */

    protected $coin;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }
}


