<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/game', [GameController::class, 'index']);