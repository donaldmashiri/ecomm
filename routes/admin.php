<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;

// admin dashboard
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
// Route::get('profile', [AdminProfileController::class, 'index'])->name('profile');

Route::post('profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');

Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');


// slider routes

Route::resource('slider', SliderController::class);

/**Category Route */

Route::resource('category', CategoryController::class);

