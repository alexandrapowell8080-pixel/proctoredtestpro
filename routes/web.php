<?php

use App\Http\Controllers\Admin\FaqAdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('home');

Route::get('/faq/{faq:slug}', [FaqController::class, 'show'])->name('faqs.show');

// FAQ Dynamic Routes
Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');

Route::get('/faqs/page/{page}', [FaqController::class, 'index'])
    ->whereNumber('page')
    ->name('faqs.page');

// Removed /category/ and added a regex constraint so it doesn't conflict with the /faqs/page/{page} route
Route::get('/faqs/{categorySlug}/{page?}', [FaqController::class, 'index'])
    ->where('categorySlug', '^(?!page$)[A-Za-z0-9\-]+')
    ->whereNumber('page')
    ->name('faqs.category');

Route::get('/faq/{faq:slug}', [FaqController::class, 'show'])->name('faqs.show');

// Blog Routes
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog');

Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');

// ==================== ADMIN ROUTES ====================

Route::prefix('admin')->name('admin.')->group(function () {

    // Admin FAQ Management
    Route::prefix('faqs')->name('faqs.')->group(function () {
        Route::get('/', [FaqAdminController::class, 'index'])->name('index');
        Route::post('/store', [FaqAdminController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [FaqAdminController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FaqAdminController::class, 'update'])->name('update');
        Route::delete('/{id}', [FaqAdminController::class, 'destroy'])->name('destroy');
        Route::post('/import', [FaqAdminController::class, 'import'])->name('import');
        Route::post('/generate', [FaqAdminController::class, 'generate'])->name('generate');
    });
  
    Route::get('/blogs', [BlogController::class, 'list'])->name('index');

    Route::get('/blogs', [BlogController::class, 'list'])->name('index'); // Admin Blog Management
    Route::prefix('blog')->name('blog.')->group(function () {
    // Admin Blog Management
    Route::get('/blogs', [BlogController::class, 'list'])->name('index');
    Route::prefix('blog')->name('blog.')->group(function () {        
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/create', [BlogController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [BlogController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BlogController::class, 'destroy'])->name('destroy');
        Route::post('/keyword', [BlogController::class, 'keyword'])->name('keyword');
        Route::post('/keywords', [BlogController::class, 'keywords'])->name('keywords');
    });

});
