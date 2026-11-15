<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// صفحة تسجيل الدخول
Route::get('/login', function () {
    return view('login');
})->name('login');
// صفحة إنشاء الحساب
Route::view('/register', 'register')->name('register');

// صفحة تسجيل جهة جديدة
Route::view('/register-entity', 'register-entity')->name('register.entity');

// صفحة لوحة تحكم الطالب
Route::view('/student/dashboard', 'student-dashboard')->name('student.dashboard');