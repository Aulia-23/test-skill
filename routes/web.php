//routes/web.php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaketController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('pakets');
        Route::get('create', 'create')->name('pakets.create');
        Route::post('store', 'store')->name('pakets.store');
        Route::get('show/{id}', 'show')->name('pakets.show');
        Route::get('edit/{id}', 'edit')->name('pakets.edit');
        Route::put('edit/{id}', 'update')->name('pakets.update');
        Route::delete('destroy/{id}', 'destroy')->name('pakets.destroy');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});
