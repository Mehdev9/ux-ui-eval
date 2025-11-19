<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;



Route::get('/', function () { return view('welcome');})->name('home');

Route::resource('products', ProductController::class);

Route::get('detailProduct', function () {return view('detailProduct');})->name('detailProduct');

Route::middleware('auth')->group(function () {
    Route::get('profil', [ProfileController::class, 'show'])->name('profil');
    Route::get('profil/edit', [ProfileController::class, 'edit'])->name('profil.edit');
    Route::patch('profil', [ProfileController::class, 'update'])->name('profil.update');
    Route::get('profil/password', [ProfileController::class, 'editPassword'])->name('profil.password.edit');
    Route::patch('profil/password', [ProfileController::class, 'updatePassword'])->name('profil.password.update');
});


Route::prefix('cart')->group(function() {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('update/{id}', [CartController::class, 'update'])->name('cart.update');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');

