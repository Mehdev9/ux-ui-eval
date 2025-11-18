<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
})->name('home');  // Route nommée 'home'

Route::resource('products', ProductController::class);


Route::get('detailProduct', function () {
    return view('detailProduct');
})->name('detailProduct');  // Route nommée 'detailProduct'

Route::get('profil', function () {
    return view('profil');
})->name('profil');  // Route nommée 'profil'

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
