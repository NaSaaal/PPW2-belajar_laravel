<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/buku', [BukuController::class, 'index']);
Route::resource('buku', BukuController::class);

Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');