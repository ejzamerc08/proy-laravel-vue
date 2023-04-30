<?php

use App\Http\Controllers\PostapiController;
use App\Http\Controllers\CategoryapiController;
use App\Http\Controllers\RolapiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('post', PostapiController::class);

Route::apiResource('category', CategoryapiController::class);

Route::apiResource('roles', RolapiController::class);
