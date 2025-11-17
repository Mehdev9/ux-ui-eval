<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');  // Route nommée 'home'

Route::get('product', function () {
    return view('product');
})->name('product');  // Route nommée 'product'

Route::get('detailProduct', function () {
    return view('detailProduct');
})->name('detailProduct');  // Route nommée 'detailProduct'

Route::get('profil', function () {
    return view('profil');
})->name('profil');  // Route nommée 'profil'
