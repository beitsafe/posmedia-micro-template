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

    // Write Your Service Routes
    Route::apiResources([
        'options' => OptionController::class
    ]);
});
