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
    Route::get('/list', \App\Http\Controllers\Api\CRUD\Author\ListController::class);
    Route::get('/{author}', \App\Http\Controllers\Api\CRUD\Author\ShowController::class);
    Route::post('/create', \App\Http\Controllers\Api\CRUD\Author\CreateController::class);
    Route::patch('/{author}', \App\Http\Controllers\Api\CRUD\Author\UpdateController::class);
    Route::delete('/{author}', \App\Http\Controllers\Api\CRUD\Author\DeleteController::class);
});

Route::group(['prefix' => 'books'], function () {
    Route::get('/list', \App\Http\Controllers\Api\CRUD\Book\ListController::class);
    Route::get('/{book}', \App\Http\Controllers\Api\CRUD\Book\ShowController::class);
    Route::post('/create', \App\Http\Controllers\Api\CRUD\Book\CreateController::class);
    Route::patch('/{book}', \App\Http\Controllers\Api\CRUD\Book\UpdateController::class);
    Route::delete('/{book}', \App\Http\Controllers\Api\CRUD\Book\DeleteController::class);
});

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'books'], function () {
        Route::get('list', [\App\Http\Controllers\Api\BookController::class, 'list']);
        Route::get('by-id', [\App\Http\Controllers\Api\BookController::class, 'byId']);
        Route::patch('update', [\App\Http\Controllers\Api\BookController::class, 'update']);
        Route::delete('{book}', [\App\Http\Controllers\Api\BookController::class, 'destroy']);
    });
});
