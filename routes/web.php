<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\WatchdogController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
require __DIR__ . '/api.php';

Route::resource('currencies', CurrencyController::class)->only(["index", "show"]);

Route::get("/", [IndexController::class, "index"]);

Route::get("watchdogs", [WatchdogController::class, "index"])->name("watchdogs.index");
