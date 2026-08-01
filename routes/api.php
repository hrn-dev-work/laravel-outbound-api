<?php

use App\Http\Controllers\Api\HealthController;
use App\Http\Controllers\Api\NotifyController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (): void {
    Route::get('/health', HealthController::class);
    Route::post('/integrations/notify', [NotifyController::class, 'store']);
    Route::get('/integrations/outbound-calls', [NotifyController::class, 'index']);
});
