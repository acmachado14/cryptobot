<?php

namespace Angelo\Criptobot\Model;

use Angelo\Criptobot\Entity\Variation as EntityVariation;
use SplObjectStorage;
use SplObserver;

class Variation implements \SplSubject
{
    private EntityVariation $variationEntity;
    private SplObjectStorage $observers;

    public function __construct(EntityVariation $variationEntity)
    {
        $this->variationEntity = $variationEntity;
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}


