<?php

use App\Http\Controllers\CurrencyController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';
require __DIR__ . '/api.php';

Route::resource('currencies', CurrencyController::class);
