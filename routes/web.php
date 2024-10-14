<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InsertController;
use App\Http\Controllers\AdminDashboardController;


Route::get('/', function () {
    return view('index');
});



Route::controller(AdminDashboardController::class)->group(function () {
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

