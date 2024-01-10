<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\vendorController;
use App\Http\Controllers\Backend\VendorProfileController;

// vendor dashboard
Route::get('dashboard', [vendorController::class, 'dashboard'])->name('dashboard');

Route::get('profile', [VendorProfileController::class,'index'])->name('profile');

Route::post('profile/update', [VendorProfileController::class, 'profileUpdate'])->name('profile.update');

Route::post('profile/update/password', [VendorProfileController::class, 'updatePassword'])->name('password.update');