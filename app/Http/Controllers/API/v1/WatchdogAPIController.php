<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Watchdog;
use Illuminate\Http\Request;

class WatchdogAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth("api")->user();
        if(empty($user)){
            abort(401, "Unauthorized");
        }

        $watchdogs = $user->watchdogs;

        return response()->json($watchdogs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Currency $currency)
    {
        $user = auth("api")->user();
        if(empty($user)){
            abort(401, "Unauthorized");
        }

        $watchdog = new Watchdog();

        $watchdog->user_id = $user->id;
        $watchdog->currency_id = $currency->id;
        $watchdog->save();

        return response()->json($watchdog);
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        $user = auth("api")->user();

        if(empty($user)){
            abort(401, "Unauthorized");
        }

        $watchdog = $user->watchdogs()->where("currency_id", $currency->id)->firstOrFail();

        return response()->json($watchdog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency)
    {
        $user = auth("api")->user();

        if(empty($user)){
            abort(401, "Unauthorized");
        }

        $watchdog = $user->watchdogs()->where("currency_id", $currency->id)->firstOrFail();
        $watchdog->delete();

        return response()->json($watchdog);
    }
}
