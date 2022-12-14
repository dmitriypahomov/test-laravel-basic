<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/todos', [\App\Http\Controllers\TodoController::class, 'index']);

Route::resource('posts', \App\Http\Controllers\BlogPostController::class);
