<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware('api')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
});


// Homepage
Route::get('/', [\App\Http\Controllers\Api\FoodController::class, 'listFood']);

// Food
Route::resource('food', \App\Http\Controllers\Api\FoodController::class)
    ->middleware('auth:sanctum')
    ->except(['create', 'edit']);

Route::resource('category', \App\Http\Controllers\Api\CategoryController::class)
    ->middleware('auth:sanctum')
    ->except(['create', 'edit']);



