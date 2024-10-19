<?php

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

// Route::get('/admin/login', [AdminController::class, 'index']);
Route::get('/admin/{admin:username}', [AdminController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLogin']); //->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']); //->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);

// Route::post('/logout', [AuthController::class, 'logout']);

// Route::redirect('/user', '/login')->middleware('guest');
