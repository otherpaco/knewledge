<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home.index');

Route::resource('documents', 'DocumentController');

Route::middleware(['auth:sanctum', 'verified'])->get('admin', function () {
    return view('dashboard');
})->name('dashboard');
