<?php

/*
|--------------------------------------------------------------------------
| Webhooks Routes
|--------------------------------------------------------------------------
|
| Here is routes to webhooks services
|
*/

use App\Http\Controllers\WebhookController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::prefix('webhooks')->name('webhooks.')->withoutMiddleware([VerifyCsrfToken::class])->controller(WebhookController::class)->group(function() {
    Route::post('/mercado-pago', 'mercadoPago');
});