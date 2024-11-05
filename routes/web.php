<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"])->middleware("notDeleted");


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
});

Route::middleware(["auth", "role:admin,moderator" , "notDeleted"])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::put('/switch-role/{user}', [AdminController::class, 'moderator'])->name('moderator');
    Route::put('/block/{user}', [AdminController::class, 'block'])->name('block');
    Route::put('/product/update/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::delete('/product/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
});
require __DIR__ . '/auth.php';
