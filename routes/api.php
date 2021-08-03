<?php

use App\Http\Controllers\Api\EStationController;
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

Route::apiResource('/stations', EStationController::class);

Route::get('/version', [EStationController::class, 'version']);

Route::get('/station/location', [EStationController::class, 'closest']);
Route::get('/station/search', [EStationController::class, 'search']);
