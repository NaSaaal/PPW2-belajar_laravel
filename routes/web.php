<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/buku', [BukuController::class, 'index']);
Route::resource('buku', BukuController::class);
Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
