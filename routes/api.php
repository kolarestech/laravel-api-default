<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\ShortController;
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

Route::get('shorts', [ShortController::class, 'index']);
Route::post('shorts', [ShortController::class, 'store']);
Route::get('shorts/{identify}', [ShortController::class, 'show']);
Route::put('shorts/{identify}', [ShortController::class, 'update']);
Route::delete('shorts/{identify}', [ShortController::class, 'destroy']);

Route::post('likes', [LikeController::class, 'store']);
Route::delete('likes/{identify}', [LikeController::class, 'destroy']);