<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProviderController;



Route::get('', [AdminController::class, "index"])->name('admin');

Route::resource("/customers", CustomerController::class);

Route::resource("/providers", ProviderController::class);
