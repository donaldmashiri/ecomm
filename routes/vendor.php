<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\vendorController;

// vendor dashboard
Route::get('dashboard', [vendorController::class, 'dashboard'])->name('dashboard');
