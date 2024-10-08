<?php

namespace App\Listeners;

use App\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cookie;

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
        $userId = auth()->id();
        $token = auth("api")->tokenById($userId);
        setcookie("access_token", $token, time() + 3600, "/"); // set plain PHP cookie to avoid Laravel encryption
    }
}
