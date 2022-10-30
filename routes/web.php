<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::resource('documents', DocumentController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('admin', function () {
    return view('dashboard');
})->name('dashboard');
