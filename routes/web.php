<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AdminAuthController::class)->group(function () {
    Route::prefix("admin")->name('admin.auth.')->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login-check', 'login_check')->name('login.check');
        Route::get('/logout', 'logout')->name('logout');
    });
});

Route::middleware('admin.auth')->group(function () {
    Route::controller(AdminDashboardController::class)->group(function () {
        Route::prefix("admin")->name('admin.')->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
        });
    });
});
