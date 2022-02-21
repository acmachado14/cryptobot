<?php

namespace Test\Unit;

use Angelo\Criptobot\Service\ApiService;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class MercadoApiTest extends TestCase
{

    public function testCanGetActualVariationFromApi(): void
    {
        //Arrange
        $service = new ApiService(new Client);

        //Atc
        $array = $service->get("BTC");

        //Assert
        $this->assertArrayHasKey('last', $array);
        $this->assertArrayHasKey('high', $array);
        $this->assertArrayHasKey('low', $array);
        $this->assertArrayHasKey('buy', $array);
        $this->assertArrayHasKey('sell', $array);
        $this->assertArrayHasKey('open', $array);
        $this->assertArrayHasKey('date', $array);

    }

}