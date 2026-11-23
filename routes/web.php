<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntityRegisterController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
Route::post('/register-entity', [EntityRegisterController::class, 'store'])->name('entity.register.store');

// مسارات الطالب المحمية (تتطلب تسجيل دخول)
Route::middleware('auth')->group(function () {
    // صفحة لوحة تحكم الطالب (بيانات ديناميكية حسب حساب الطالب)
    Route::get('/student/dashboard', function () {
        $user = Auth::user();

        $examCompleted = (bool) ($user->exam_completed ?? false);
        $examTrack = $user->exam_track;
        $examScore = $user->exam_score;
        $examLevel = $user->exam_level;
        $examTrackName = match ($examTrack) {
            'web' => 'تطوير الويب',
            'ai' => 'الذكاء الاصطناعي',
            default => 'تحديد المستوى',
        };

        $isVisible = (bool) ($user->is_visible ?? false);

        $requestsCount = method_exists($user, 'contactRequests')
            ? $user->contactRequests()->count()
            : ($user->contact_requests_count ?? 0);

        $hasBio = !empty($user->bio);
        $hasPortfolio = !empty($user->portfolio);

        $completedSteps = ($examCompleted ? 1 : 0) + ($hasBio ? 1 : 0) + ($hasPortfolio ? 1 : 0);
        $completionPercent = round(($completedSteps / 3) * 100);

        $activities = collect();
        if ($examCompleted) {
            $activities->push((object) [
                'title' => "أنهيت اختبار تحديد المستوى في {$examTrackName} ({$examScore}/20 - {$examLevel})",
                'created_at' => $user->exam_completed_at,
            ]);
        }

        return view('student-dashboard', compact(
            'user',
            'examCompleted',
            'examTrack',
            'examScore',
            'examLevel',
            'examTrackName',
            'isVisible',
            'requestsCount',
            'hasBio',
            'hasPortfolio',
            'completionPercent',
            'activities'
        ));
    })->name('student.dashboard');

    // صفحة ملفي الشخصي (عرض وتحديث)
    Route::get('/student/profile', [ProfileController::class, 'edit'])->name('student.profile');
    Route::post('/student/profile', [ProfileController::class, 'update'])->name('student.profile.update');

    // صفحة التدريب والمنح
    Route::view('/student/opportunities', 'student-opportunities')->name('student.opportunities');

    // صفحة الطلبات
    Route::view('/student/requests', 'student-requests')->name('student.requests');

    // صفحة الاختبار (تحديد المستوى من 20 سؤالاً: تطوير ويب / ذكاء اصطناعي)
    Route::get('/student/exam', [ExamController::class, 'show'])->name('student.exam');
    Route::post('/student/exam', [ExamController::class, 'submit'])->name('student.exam.submit');
});

// لوحة تحكم الادمن
Route::get('/admin/dashboard', function () {
    $pendingEntitiesCount = User::where('role', 'entity')
        ->where('is_approved', false)
        ->count();

    $studentsCount = User::where('role', 'student')->count();

    $entities = User::where('role', 'entity')
        ->latest()
        ->get();

    return view('admin.dashboard', compact(
        'pendingEntitiesCount',
        'studentsCount',
        'entities'
    ));
})->name('admin.dashboard');

// اعتماد / الموافقة على حساب جهة
Route::post('/admin/entities/{user}/approve', function (User $user) {
    if ($user->role === 'entity') {
        $user->update(['is_approved' => true]);
    }

    return redirect()
        ->route('admin.dashboard')
        ->with('status', 'تمت الموافقة على الجهة وتفعيل حسابها بنجاح.');
})->name('admin.entities.approve');

// رسائل النظام
Route::get('/system-messages', function () {
    return view('system-messages');
})->name('system.messages');

// مسارات الجهة
Route::get('/entity/dashboard', function () {
    return view('entity-dashboard');
})->name('entity.dashboard');

Route::get('/entity/students', function () {
    $students = User::where('role', 'student')
        ->where('is_visible', true)
        ->latest()
        ->get();

    return view('entity-students', compact('students'));
})->name('entity.students');

Route::get('/entity/requests', function () {
    return view('entity-requests');
})->name('entity.requests');

Route::get('/entity/profile', function () {
    return view('entity-profile');
})->name('entity.profile');