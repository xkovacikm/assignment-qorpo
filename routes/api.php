<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    $controller = AuthController::class;
    Route::post('login', "$controller@login");
    Route::post('logout', "$controller@logout");
    Route::post('refresh', "$controller@refresh");
    Route::post('me', "$controller@me");

});
