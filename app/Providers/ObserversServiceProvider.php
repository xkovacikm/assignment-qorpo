<?php

namespace App\Providers;

use App\Models\Currency;
use App\Observers\CheckChangePrice;
use Illuminate\Support\ServiceProvider;

class ObserversServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Currency::observe(CheckChangePrice::class);
    }
}
