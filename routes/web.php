<?php
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Route::get('/student/details', function () {
    return view('student-list-table');
});

Route::get('/student/admission/form', function () {
    return view('student-admission-form');
});

Route::get('/table', function () {
    return view('layouts.common-table');
});