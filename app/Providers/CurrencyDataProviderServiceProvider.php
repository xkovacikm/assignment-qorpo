<?php

namespace App\Providers;

use App\Components\DataSource\Currencies\CoinGeckoCurrencyDataProvider;
use App\Components\DataSource\Currencies\CurrencyDataProviderInterface;
use App\Components\DataSource\Currencies\MockCoinGeckoCurrencyDataProvider;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class CurrencyDataProviderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->bind(CurrencyDataProviderInterface::class, function(){
            return new CoinGeckoCurrencyDataProvider( new Client());
        });

        /*app()->bind(CurrencyDataProviderInterface::class, function(){
            return new MockCoinGeckoCurrencyDataProvider();
        });*/ // uncomment this line in order to use the mock data provider
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
