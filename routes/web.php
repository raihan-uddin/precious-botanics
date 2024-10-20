<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/delivery-information', [PageController::class, 'deliveryInformation'])->name('delivery.information');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/terms-of-service', [PageController::class, 'termsOfService'])->name('terms.of.service');
Route::get('/return-policy', [PageController::class, 'returnPolicy'])->name('return.policy');
Route::get('/contact-us', [PageController::class, 'contact'])->name('contact');

// cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart');

// show product on modal
Route::post('/quick-view', [ProductController::class, 'quickView'])->name('quick.view');

Route::get('/products/search', [ProductController::class, 'searchView'])->name('search.results');
Route::post('/products/search', [ProductController::class, 'search'])->name('api.products.search');


Route::get('/{slug}', [ProductController::class, 'categoryProducts'])->name('category.products');
Route::get('/{category_slug}/product/{slug}', [ProductController::class, 'productDetail'])->name('product.detail');

Route::get('/tag/{slug}', [ProductController::class, 'tagProducts'])->name('tag.products');




require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
require __DIR__.'/seo.php';
