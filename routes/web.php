<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
