<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/blogs',[BlogController::class,'index'])->name('blogs');
Route::get('/blog/{slug}',[BlogController::class,'show'])->name('blog');
// Route::get('/blogs',[BlogController::class,'index'])->name('blogs');
