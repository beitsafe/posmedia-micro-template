<?php

use App\Http\Controllers\HealthController;
use App\Http\Controllers\OptionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/v1/devsafe/')->group(function () {
    Route::get('healthz', [HealthController::class, 'healthz']);
    Route::get('json', [HealthController::class, 'json']);

    // Sample Repository Pattern
    Route::get('options', [OptionController::class, 'index']);
    Route::get('options/{id}', [OptionController::class, 'show']);
    Route::post('options', [OptionController::class, 'store']);
    Route::put('options/{id}', [OptionController::class, 'update']);
    Route::delete('options/{id}', [OptionController::class, 'delete']);

    // Write Your Service Routes
});
