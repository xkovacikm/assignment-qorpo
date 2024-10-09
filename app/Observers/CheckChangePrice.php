<?php

namespace App\Observers;

use App\Jobs\SendWatchdogPriceChange;
use App\Mail\WatchdogPriceChange;
use App\Models\Currency;
use Illuminate\Support\Facades\Mail;

class CheckChangePrice
{
    /**
     * Handle the Currency "updated" event.
     */
    public function updated(Currency $currency): void
    {
        $oldPrice = doubleval($currency->getOriginal('current_price'));
        $newPrice = $currency->current_price;

        $changedPrice = $oldPrice !== $newPrice;

        if(!$changedPrice){
            return;
        }

        $watchdogs = $currency->watchdogs()->with("user")->chunk(100, function ($watchdogs) use ($currency) {

            foreach ($watchdogs as $watchdog) {

                Mail::to($watchdog->user->email)
                    ->queue(new WatchdogPriceChange($currency));

            }
        });
    }
}
