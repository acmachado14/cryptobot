<?php

namespace Angelo\Criptobot\Handler;

use Angelo\Criptobot\Entity\Variation as EntityVariation;
use Angelo\Criptobot\Model\Variation;
use Angelo\Criptobot\Observer\VariationObserver;
use Angelo\Criptobot\Service\SendEmail;

class VariationHandler
{
    private $variation;

    public function __construct(EntityVariation $variation)
    {
        $this->variation = $variation;
        $this->valuedCoin();
        $this->devaluedCoin();
    }

    private function valuedCoin(): void
    {
        if ($this->variation->getValue() >= 250000){
            $this->actionObserver(
                "Sua moeda atingiu a resistencia cadastrada, valor atual: {$this->variation->getValue()}"
            );
        }
    }

    private function devaluedCoin(): void
    {
        if ($this->variation->getValue() <= 150000){
            $this->actionObserver(
                "Sua moeda atingiu o suporte cadastrado, valor atual: {$this->variation->getValue()}"
            );
        }
    }

    private function actionObserver(string $mensage): void
    {
        $variationObserver = new VariationObserver($mensage, new SendEmail);

        $variation = new Variation($this->variation);

        $variation->attach($variationObserver);

        $variation->notify();
    }


}