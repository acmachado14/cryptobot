<?php

namespace Angelo\Criptobot\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ApiService
{
    public function __construct(
        Client $client
    )
    {
        $this->client = $client;
    }

    public function get(string $moeda): array
    {
        $uri = "https://www.mercadobitcoin.net/api/{$moeda}/ticker/";

        try {
            $response = $this->client->get($uri);
            $array = json_decode($response->getBody(), true);
            return $array['ticker'];

        } catch (RequestException $exception) {
            return [
                'error' => $exception->getMessage()
            ];
        }
    }

}