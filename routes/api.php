<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);

Route::group(['prefix' => 'posts', 'middleware' => 'auth:sanctum'],  function() {
    Route::get('/', [PostController::class, 'index']);
    Route::post('/', [PostController::class, 'store']);
});
