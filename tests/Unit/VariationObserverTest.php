<?php

namespace Test\Unit;

use Angelo\Criptobot\Entity\Coin;
use Angelo\Criptobot\Entity\Variation as EntityVariation;
use Angelo\Criptobot\Model\Variation;
use Angelo\Criptobot\Observer\VariationObserver;
use Angelo\Criptobot\Service\SendEmail;
use DateTime;
use PHPUnit\Framework\TestCase;

class VariationObserverTest extends TestCase
{
    public function testShouldCreateVariationObservers(): void
    {
        $coin = new Coin('BTC');
        $mensagem1 = "Goes Up";
        $mensagem2 = "Goes Down";

        $variationUpObserver = new VariationObserver($mensagem1, new SendEmail);
        $variationDownObserver = new VariationObserver($mensagem2, new SendEmail);

        $variation = new Variation(new EntityVariation($coin, 200000, new DateTime,));

        $variation->attach($variationUpObserver);
        $variation->attach($variationDownObserver);

        $variation->notify();

        $this->expectOutputString(
            $mensagem1 . $mensagem2
        );
    }
}