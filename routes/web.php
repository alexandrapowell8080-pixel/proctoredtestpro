<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FaqAdminController;
use App\Http\Controllers\FaqController;

<<<<<<< HEAD
Route::get('/', function () {
    return view('welcome');
});



Route::get('/faq/{faq:slug}', [FaqController::class, 'show'])
    ->name('faqs.show');

Route::get('/faqs', [FaqController::class, 'index'])
    ->name('faqs.index');

Route::get('/faqs/{page}', [FaqController::class, 'index'])
    ->whereNumber('page')
    ->name('faqs.page');

Route::get('/faqs/{school}/{page?}', [FaqController::class, 'index'])
    ->where('school', '[A-Za-z0-9\-]+')
    ->whereNumber('page')
    ->name('faqs.school');
    
Route::view('/faq', 'pages.faq')->name('faq');

// --- ADMIN ROUTES ---
Route::prefix('admin')->name('admin.')->group(function () {


        Route::prefix('faqs')->name('faqs.')->group(function () {
            Route::get('/', [FaqAdminController::class, 'index'])->name('index');
            Route::post('/import', [FaqAdminController::class, 'import'])->name('import');
            Route::post('/generate', [FaqAdminController::class, 'generate'])->name('generate');
            Route::delete('/{id}', [FaqAdminController::class, 'destroy'])->name('destroy');
        });
    });
=======
Route::get('/', [LandingController::class, 'index'])->name('home');
>>>>>>> main
