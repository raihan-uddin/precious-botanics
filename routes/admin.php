<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TagController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

// group routes with admin middleware
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Auth routes
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::prefix('/admin')->middleware(['auth', AdminMiddleware::class])->group(function () {
        Route::resource('settings', SettingsController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('tags', TagController::class);
        Route::resource('products', ProductController::class);
        Route::post('/remove-gallery-image', [ProductController::class, 'removeGalleryImage'])->name('remove.image');

        Route::resource('banners', BannerController::class);
    });
});
