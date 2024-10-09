<?php

namespace App\Components\DataSource\Currencies;

use GuzzleHttp\Client;

class CoinGeckoCurrencyDataProvider implements CurrencyDataProviderInterface
{
    const URL = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd';

    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get(): array
    {
        $response = $this->client->request('GET', static::URL, [
            'headers' => [
                'accept' => 'application/json',
                'x-cg-demo-api-key' => env('COIN_API_KEY')
            ],
        ]);

        $data = $response->getBody();
        $data = json_decode($data, true);

        return $data;
    }
}
