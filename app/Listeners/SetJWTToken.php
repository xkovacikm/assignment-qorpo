<?php

namespace App\Listeners;

use App\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetJWTToken
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(\Illuminate\Auth\Events\Login $event): void
    {

        $userId = auth("api")->user();
        dd($userId);
        $token = auth("api")->tokenById(123);
    }
}
