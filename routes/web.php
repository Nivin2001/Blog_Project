<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogSectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('Blog.welcome');
});

// Login Route
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Authentication Route (POST for login submission)
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/dashboard', function () {
    return view('Blog.dashboard'); // Change this to your desired dashboard view
})->name('dashboard');


    // User Management Routes
    Route::resource('users', UserController::class);

    // Blog Management Routes
    Route::resource('blogs', BlogController::class);

    // Blog Section Management Routes
    Route::resource('blog_sections', BlogSectionController::class);

// Optional: Route for logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
