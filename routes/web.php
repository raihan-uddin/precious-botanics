<?php

use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


Route::get('/category/{slug}', [PageController::class, 'categoryProduct'])->name('category.product');
Route::get('/product/{slug}', [PageController::class, 'productDetail'])->name('product.detail');

require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
