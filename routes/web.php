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

// صفحة ملفي الشخصي 
Route::view('/student/profile', 'student-profile')->name('student.profile');
//لصفحة التدريب والمنح
Route::view('/student/opportunities', 'student-opportunities')->name('student.opportunities');

Route::view('/student/requests', 'student-requests')->name('student.requests');

Route::view('/student/exam', 'student-exam')->name('student.exam');
//لوحة تحكم الادمن
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
//رسائل النظام
Route::get('/system-messages', function () {
    return view('system-messages');
})->name('system.messages');