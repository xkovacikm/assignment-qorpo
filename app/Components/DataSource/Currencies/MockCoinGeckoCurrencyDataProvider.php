<?php

namespace App\Components\DataSource\Currencies;

use Illuminate\Support\Facades\Storage;

class MockCoinGeckoCurrencyDataProvider implements CurrencyDataProviderInterface
{

    public function get(): array
    {
        $data = Storage::get("coingecko-coins.json");
        return json_decode($data, true);
    }
}
