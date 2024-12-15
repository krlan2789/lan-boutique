<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductVariantController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/c/{category:slug}', [CategoryController::class, 'variants']);

Route::get('/new-arrival', [ProductVariantController::class, 'latest']);
Route::get('/new-arrival/all', [ProductVariantController::class, 'latestAll']);
Route::get('/new-arrival/{category:slug}', [ProductVariantController::class, 'latestCategory']);
Route::get('/pv/search', [ProductVariantController::class, 'search']);
Route::get('/pv/{productVariant:slug}', [ProductVariantController::class, 'index']);

Route::get('/cart', function () {
    return view('home');
});
Route::post('/cart', function () {
    return redirect('/');
});

// Policy
Route::get('/term-of-use', function () {
    return view('components.term-of-use', [
        'head_title' => env('APP_NAME') . ' | Term of Use',
    ]);
});
Route::get('/privacy-policy', function () {
    return view('components.privacy-policy', [
        'head_title' => env('APP_NAME') . ' | Privacy Policy',
    ]);
});
// Policy

// AUthentication
// Route::get('/admin/login', [AdminController::class, 'index']);
Route::get('/admin/{admin:username}', [AdminController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLogin']); //->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']); //->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);
// Route::post('/logout', [AuthController::class, 'logout']);
// AUthentication

Route::fallback(function () {
    return redirect('/');
});
