<?php

namespace Angelo\Criptobot\Service;

use Angelo\Criptobot\Handler\VariationHandler;
use Angelo\Criptobot\Service\ApiService;
use Angelo\Criptobot\Service\SendEmail;
use GuzzleHttp\Client;

Class Calculate
{
    public function constantVerify(): void
    {
        $api = new ApiService(new Client);
        while (true) {
            $lastValue = round($api->get('BTC')['last'], 2);
            //$variationHandler = new VariationHandler();
            echo "valor do BTC as atual: {$lastValue} \n";
            sleep(1800);
        }

    }
}
