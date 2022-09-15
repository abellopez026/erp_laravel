<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;



Route::get('', [AdminController::class, "index"])->name('admin');


Route::resource("/customers", CustomerController::class);

Route::resource("/providers", ProviderController::class);

Route::resource("/categories", CategoryController::class);

Route::resource("/products", ProductController::class);
