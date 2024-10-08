<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
require __DIR__ . '/api.php';

Route::resource('currencies', CurrencyController::class);

Route::get("/", IndexController::class . "@index");
