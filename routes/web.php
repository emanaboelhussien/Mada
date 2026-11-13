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