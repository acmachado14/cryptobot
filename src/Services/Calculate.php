<?php

namespace Angelo\Criptobot\Services;

use Angelo\Criptobot\Services\ApiService;
use Angelo\Criptobot\Services\SendEmail;
use GuzzleHttp\Client;

Class Calculate
{
    public function constantVerify(): void
    {
        $api = new ApiService(new Client);
        $email = new SendEmail();
        while (true) {
            $lastValue = round($api->get('BTC')['last'], 2);
            if ($lastValue >= 250000){
                $email->send("CORRE E VENDE! BIT COIN BATEU {$lastValue}");
                break;
            }
            if ($lastValue <= 150000){
                $email->send("ATENCAO! BIT COIN BATEU {$lastValue}");
                break;
            }
            echo "valor do BTC as atual: {$lastValue} \n";
            sleep(1800);
        }

    }
}
