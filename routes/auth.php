<?php

use App\Http\Controllers\API\v1\AuthAPIController;
use App\Http\Controllers\API\v1\CurrencyAPIController;
use App\Http\Controllers\Auth\OLDAuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CustomAuth\CustomLoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get("login", [CustomLoginController::class, "login"])->name("login");
});

Route::name("api.v1.")->middleware("api")->prefix("api/v1/auth")->group(function ($router) {
    $controller = AuthAPIController::class;
    Route::post('login', "$controller@login");

    Route::middleware('auth:api')->group(function ($router) use ($controller){
        Route::post('logout', "$controller@logout");
        Route::post('refresh', "$controller@refresh");
        Route::post('me', "$controller@me");
    });
});

/// defaul laravel
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    /*Route::get('login', [OLDAuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [OLDAuthenticatedSessionController::class, 'store']);*/

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    /*Route::post('logout', [OLDAuthenticatedSessionController::class, 'destroy'])
        ->name('logout');*/
});
