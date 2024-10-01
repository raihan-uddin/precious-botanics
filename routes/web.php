<?php


use App\Http\Controllers\Frontend\PageController; 
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [PageController::class, 'index'])->name('home');


require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
