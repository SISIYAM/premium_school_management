<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminDashboardController;


Route::get('/error/403', function () {
    return view('layouts.forbitten');
})->name('error.403');


// routes for authentication
Route::controller(AuthController::class)->group(function(){
    Route::get('/auth/admin/register','loadRegister')->name('admin.load.register');
    Route::get('/auth/admin/login','loadLogin')->name('admin.load.login');
    Route::post('/auth/admin/execute/register','adminRegister')->name('admin.register');
    Route::post('/auth/admin/execute/login','adminLogin')->name('admin.login');
    Route::get('/logout','logout')->name('admin.logout');
});

// admin middleware
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('/admin/dashboard','loadAdminDashboard')->name('admin.dashboard');
    });
});