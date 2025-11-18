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
})->name('profil')->middleware('auth');

use App\Http\Controllers\CartController;

Route::prefix('cart')->group(function() {
    // Affichage du panier
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    
    // Ajouter un produit au panier
    Route::post('add/{id}', [CartController::class, 'add'])->name('cart.add');
    
    // Supprimer un produit du panier
    Route::get('remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    
    // Mettre à jour la quantité d'un produit dans le panier
    Route::post('update/{id}', [CartController::class, 'update'])->name('cart.update');
});




Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
