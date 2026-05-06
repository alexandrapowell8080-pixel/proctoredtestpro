<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqAdminController;
use App\Http\Controllers\FaqController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog');


Route::get('/faq/{faq:slug}', [FaqController::class, 'show'])->name('faqs.show');

Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');

Route::get('/faqs/page/{page}', [FaqController::class, 'index'])
    ->whereNumber('page')
    ->name('faqs.page');

Route::get('/faqs/category/{categorySlug}/{page?}', [FaqController::class, 'index'])
    ->where('categorySlug', '[A-Za-z0-9\-]+')
    ->whereNumber('page')
    ->name('faqs.category');
    

// --- ADMIN ROUTES ---
Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('faqs')->name('faqs.')->group(function () {
        Route::get('/', [FaqAdminController::class, 'index'])->name('index');
        Route::post('/import', [FaqAdminController::class, 'import'])->name('import');
        Route::post('/generate', [FaqAdminController::class, 'generate'])->name('generate');
        Route::delete('/{id}', [FaqAdminController::class, 'destroy'])->name('destroy');

        Route::post('/store', [FaqAdminController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [FaqAdminController::class, 'edit'])->name('edit');
        Route::put('/{id}', [FaqAdminController::class, 'update'])->name('update');


    });
});

Route::get('/', [LandingController::class, 'index'])->name('home');