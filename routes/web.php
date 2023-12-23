<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::prefix("admin")->group( function() {
    Route::controller(AdminController::class)->group(function() {
        Route::match(['get','post'], '/login', 'login')->name('admin.login');

        Route::middleware('auth:admin')->group(function() {
            Route::get('/','index')->name('admin.dashboard');
        });
    });
});