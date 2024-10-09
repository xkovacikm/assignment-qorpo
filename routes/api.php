<?php

use App\Http\Controllers\API\v1\CurrencyAPIController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::name("api.v1.")->middleware("api")->prefix("api/v1")->group(function ($router) {
    $controller = AuthController::class;

    Route::post('login', "$controller@login");
    Route::apiResource('currencies', CurrencyAPIController::class);

    Route::middleware('auth:api')->group(function ($router) use($controller)
    {
        Route::post('logout', "$controller@logout");
        Route::post('refresh', "$controller@refresh");
        Route::post('me', "$controller@me");
    });
});
