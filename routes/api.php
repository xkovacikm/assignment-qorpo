<?php

use App\Http\Controllers\API\v1\CurrencyAPIController;
use App\Http\Controllers\API\v1\WatchdogAPIController;
use Illuminate\Support\Facades\Route;

Route::name("api.v1.")->middleware("api")->prefix("api/v1")->group(function ($router) {
    Route::apiResource('currencies', CurrencyAPIController::class)->only(["index", "show"]);

    Route::get("watchdogs", [WatchdogAPIController::class, "index"]);
    Route::post("watchdogs/{currency}", [WatchdogAPIController::class, "store"]);
    Route::get("watchdogs/{currency}", [WatchdogAPIController::class, "show"]);
    Route::delete("watchdogs/{currency}", [WatchdogAPIController::class, "destroy"]);
});
