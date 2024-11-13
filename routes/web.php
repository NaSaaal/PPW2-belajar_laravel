<?php
// use App\Http\Controllers\DashboardController;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BukuController;
// use App\Http\Controllers\Auth\LoginRegisterController;

// Route::middleware(['auth'])->group(function () {
//     Route::get('/buku', [BukuController::class, 'index']);
//     Route::resource('buku', BukuController::class);
//     Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
//     Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
//     Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
//     Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
//     Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');

//     Route::get('/dashboard', [bukuController::class, 'dashboard'])->name('dashboard');
// });

// Route::get('/', function () {
//     return view('layout');
// });

// Route::get('/buku', [BukuController::class, 'index']);
// Route::resource('buku', BukuController::class);

// Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
// Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
// Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
// Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
// Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');

// Route::controller(LoginRegisterController::class)->group(function () {
//     Route::get('/register', 'register')->name('register');
//     Route::post('/store', 'store')->name('store');
//     Route::get('/login', 'login')->name('login');
//     Route::post('/authenticate', 'authenticate')->name('authenticate');
//     Route::get('/dashboard', 'dashboard')->name('dashboard');
//     Route::post('/logout', 'logout')->name('logout');
// });
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SendEmailController;

Route::get('/send-mail', [
    SendEmailController::class,
    'index'
])->name('kirim-email');

Route::post('/post-email', [SendEmailController::class, 'store'])->name('post-email');

Route::resource('users', UserController::class);
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// Route untuk halaman utama (redirect ke dashboard jika login)
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Routes untuk login, register, dan logout
Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');
Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

// Route untuk dashboard, hanya bisa diakses setelah login
Route::get('/dashboard', [LoginRegisterController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'admin']);

// Routes untuk Buku (CRUD)
Route::middleware('auth')->group(function () {
    Route::resource('buku', BukuController::class);
});

Route::get('/home', function () {
    return view('home');
});

