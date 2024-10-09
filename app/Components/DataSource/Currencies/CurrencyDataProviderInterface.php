<?php

namespace App\Components\DataSource\Currencies;

interface CurrencyDataProviderInterface
{
    public function get(): array;
}
