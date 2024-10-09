<?php

namespace App\Providers;

use App\Components\DataSource\Currencies\CurrencyDataProviderInterface;
use App\Components\DataSource\Currencies\MockCoinGeckoCurrencyDataProvider;
use Illuminate\Support\ServiceProvider;

class CurrencyDataProviderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        app()->bind(CurrencyDataProviderInterface::class, function(){
            return new MockCoinGeckoCurrencyDataProvider();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
