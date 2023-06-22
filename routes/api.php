<?php

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

Route::group(['prefix' => 'authors'], function () {
   Route::get('/{author}', \App\Http\Controllers\Api\Author\ShowController::class);
   Route::post('/create', \App\Http\Controllers\Api\Author\CreateController::class);
   Route::patch('/{author}', \App\Http\Controllers\Api\Author\UpdateController::class);
   Route::delete('/{author}', \App\Http\Controllers\Api\Author\DeleteController::class);
});

Route::group(['prefix' => 'books'], function () {
    Route::get('/{book}', \App\Http\Controllers\Api\Book\ShowController::class);
    Route::post('/create', \App\Http\Controllers\Api\Book\CreateController::class);
    Route::patch('/{book}', \App\Http\Controllers\Api\Book\UpdateController::class);
    Route::delete('/{book}', \App\Http\Controllers\Api\Book\DeleteController::class);
});
