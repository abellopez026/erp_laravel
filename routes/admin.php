<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CustomerController;



Route::get('', [AdminController::class, "index"])->name('admin');

Route::resource("/customers", CustomerController::class);
