<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\FaqAdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [LandingController::class, 'index'])->name('home');

Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
Route::get('/faqs/page/{page}', [FaqController::class, 'index'])->whereNumber('page')->name('faqs.page');
Route::get('/faqs/{categorySlug}/{page?}', [FaqController::class, 'index'])
    ->where('categorySlug', '^(?!page$)[A-Za-z0-9\-]+')
    ->whereNumber('page')
    ->name('faqs.category');
Route::get('/faq/{faq:slug}', [FaqController::class, 'show'])->name('faqs.show');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blogs/{category}', [BlogController::class, 'index'])->name('blogs');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog');

Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');


// ==================== ADMIN ROUTES ====================
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return redirect()->route('admin.dashboard'); 
    });

    // Auth Routes
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'sendOtp'])->name('login.send');
    Route::get('login/otp', [AdminAuthController::class, 'showOtpForm'])->name('otp.form');
    Route::post('login/otp', [AdminAuthController::class, 'verifyOtp'])->name('login.verify');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware('auth:admin')->group(function () {
        
        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

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

        // Admin Blog Management
        Route::prefix('blogs')->name('blog.')->group(function () {
            Route::get('/', [AdminBlogController::class, 'list'])->name('index');
            Route::get('/create', [AdminBlogController::class, 'create'])->name('create');
            Route::post('/create', [AdminBlogController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AdminBlogController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [AdminBlogController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [AdminBlogController::class, 'destroy'])->name('destroy');
            Route::post('/keyword', [AdminBlogController::class, 'keyword'])->name('keyword');
            Route::post('/keywords', [AdminBlogController::class, 'keywords'])->name('keywords');
            Route::post('/generate', [AdminBlogController::class, 'generate'])->name('generate');
        });

        // Admin User Management
        Route::resource('users', \App\Http\Controllers\Admin\AdminUserController::class)->except(['show']);    

    });
});
