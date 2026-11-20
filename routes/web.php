<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// صفحة تسجيل الدخول
Route::get('/login', function () {
    return view('login');
})->name('login');

// مسار استقبال بيانات الفورم والتحقق منها
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// تسجيل الخروج
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// صفحة إنشاء الحساب
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// صفحة تسجيل جهة جديدة
Route::view('/register-entity', 'register-entity')->name('register.entity');

// مسارات الطالب المحمية (تتطلب تسجيل دخول)
Route::middleware('auth')->group(function () {
    // صفحة لوحة تحكم الطالب
    Route::view('/student/dashboard', 'student-dashboard')->name('student.dashboard');

    // صفحة ملفي الشخصي
    Route::view('/student/profile', 'student-profile')->name('student.profile');

    // صفحة التدريب والمنح
    Route::view('/student/opportunities', 'student-opportunities')->name('student.opportunities');

    // صفحة الطلبات
    Route::view('/student/requests', 'student-requests')->name('student.requests');

    // صفحة الاختبار
    Route::view('/student/exam', 'student-exam')->name('student.exam');
});

// لوحة تحكم الادمن
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

// رسائل النظام
Route::get('/system-messages', function () {
    return view('system-messages');
})->name('system.messages');