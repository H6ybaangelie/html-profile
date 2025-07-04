<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile-student', function () {
    return view('student.profile');
});

Route::get('/profile-instructor', function () {
    return view('instructor.profile');
});

Route::get('/profile-admin', function () {
    return view('admin.profile');
});

Route::get('/profile-superadmin', function () {
    return view('superadmin.profile');
});