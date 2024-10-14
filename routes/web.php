<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\InsertController;
use App\Http\Controllers\AdminDashboardController;


Route::get('/', function () {
    return view('welcome');
});

// routes for error
Route::get('/error/403',function(){
    return view('errors.forbiddent');
})->name('error.403');
Route::get('/error/404',function(){
    return view('errors.error-404');
})->name('error.404');

// routes for authentication
Route::controller(AuthController::class)->group(function(){
    Route::get('/auth/admin/login','loadLogin')->name('admin.load.login');
    Route::get('/auth/admin/register','loadRegister')->name('admin.load.register');
    Route::post('/auth/admin/execute/register','adminRegister')->name('admin.register');
    Route::post('/auth/admin/execute/login','adminLogin')->name('admin.login');
    Route::get('/logout','logout')->name('admin.logout');
});


Route::middleware([AdminMiddleware::class])->group(function(){
    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('/','loadDashboard')
        ->name('admin.dashboard');
        Route::get('/student/details','loadStudentDetailsTable')
        ->name('admin.student.details');
        Route::get('/student/create','loadStudentCreateForm')
        ->name('admin.student.create');
        Route::get('/student/profile/{id?}','loadStudentProfile')
        ->name('admin.student.profile');
    });

    Route::controller(InsertController::class)->group(function () {
        Route::post('/student/create/execute','insertStudentDetails')->name('execute.student.create');
    });
});

