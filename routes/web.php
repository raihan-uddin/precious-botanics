<?php

use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/delivery-information', [PageController::class, 'deliveryInformation'])->name('delivery.information');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/terms-of-service', [PageController::class, 'termsOfService'])->name('terms.of.service');
Route::get('/return-policy', [PageController::class, 'returnPolicy'])->name('return.policy');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/{slug}', [PageController::class, 'categoryProducts'])->name('category.products');
Route::get('/{category_slug}/product/{slug}', [PageController::class, 'productDetail'])->name('product.detail');

require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
