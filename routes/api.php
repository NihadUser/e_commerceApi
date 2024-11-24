<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\{LoginController, RegisterController};
use \App\Http\Controllers\Site\{HomeController, SearchController, DetailsController};

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    # home apis
    Route::get('/user', [LoginController::class, 'getUser']);
    Route::get('/products', [HomeController::class, 'products']);
    Route::get('/categories', [HomeController::class, 'categories']);
    Route::get('/productDetails/{id}', [DetailsController::class, 'index']);
    # search apis
    Route::group(['prefix' => 'search'], function () {
        Route::get('/brands/{keyword?}', [SearchController::class, 'brands']);
        Route::get('/products/{id}', [SearchController::class, 'products']);
    });
});
