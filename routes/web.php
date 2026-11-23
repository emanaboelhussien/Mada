<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntityRegisterController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;
use App\Models\Opportunity;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
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
    Route::get('/student/opportunities', function () {
        $opportunities = Opportunity::where('status', 'مفتوحة')
            ->latest()
            ->get();

        return view('student-opportunities', compact('opportunities'));
    })->name('student.opportunities');

    // صفحة الطلبات
    Route::view('/student/requests', 'student-requests')->name('student.requests');

    // صفحة الاختبار (تحديد المستوى من 20 سؤالاً: تطوير ويب / ذكاء اصطناعي)
    Route::get('/student/exam', [ExamController::class, 'show'])->name('student.exam');
    Route::post('/student/exam', [ExamController::class, 'submit'])->name('student.exam.submit');
});

// مسارات الأدمن المحمية (تتطلب تسجيل دخول + دور admin)
Route::middleware('auth')->group(function () {
    // لوحة تحكم الادمن
    Route::get('/admin/dashboard', function () {
        abort_unless(Auth::user()->role === 'admin', 403);

        $pendingEntitiesCount = User::where('role', 'entity')
            ->where('is_approved', false)
            ->count();

        $openOpportunitiesCount = Opportunity::where('status', 'مفتوحة')->count();
        $studentsCount = User::where('role', 'student')->count();
        $questionsCount = Question::count();

        $entities = User::where('role', 'entity')
            ->latest()
            ->get();

        $opportunities = Opportunity::latest()->get();
        $questions = Question::latest()->get();

        return view('admin.dashboard', compact(
            'pendingEntitiesCount',
            'openOpportunitiesCount',
            'studentsCount',
            'questionsCount',
            'entities',
            'opportunities',
            'questions'
        ));
    })->name('admin.dashboard');

    // اعتماد / الموافقة على حساب جهة
    Route::post('/admin/entities/{user}/approve', function (User $user) {
        abort_unless(Auth::user()->role === 'admin', 403);

        if ($user->role === 'entity') {
            $user->update(['is_approved' => true]);
        }

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'تمت الموافقة على الجهة وتفعيل حسابها بنجاح.');
    })->name('admin.entities.approve');

    // رفض طلب الجهة وحذفه
    Route::delete('/admin/entities/{user}/reject', function (User $user) {
        abort_unless(Auth::user()->role === 'admin', 403);

        if ($user->role === 'entity' && !$user->is_approved) {
            $user->delete();
        }

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'تم رفض طلب الجهة وحذفه بنجاح.');
    })->name('admin.entities.reject');

    // إضافة فرصة جديدة
    Route::post('/admin/opportunities', function (Request $request) {
        abort_unless(Auth::user()->role === 'admin', 403);

        $validated = $request->validate([
            'type' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'organization_name' => ['required', 'string', 'max:255'],
            'field' => ['nullable', 'string', 'max:255'],
            'deadline' => ['nullable', 'date'],
            'status' => ['nullable', 'string', 'max:100'],
        ]);

        Opportunity::create([
            'type' => $validated['type'],
            'title' => $validated['title'],
            'organization_name' => $validated['organization_name'],
            'field' => $validated['field'] ?? null,
            'deadline' => $validated['deadline'] ?? null,
            'last_verified_at' => now(),
            'status' => $validated['status'] ?? 'مفتوحة',
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'تمت إضافة الفرصة بنجاح.');
    })->name('admin.opportunities.store');

    // حذف فرصة
    Route::delete('/admin/opportunities/{opportunity}', function (Opportunity $opportunity) {
        abort_unless(Auth::user()->role === 'admin', 403);

        $opportunity->delete();

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'تم حذف الفرصة بنجاح.');
    })->name('admin.opportunities.destroy');

    // إضافة سؤال اختبار جديد
    Route::post('/admin/questions', function (Request $request) {
        abort_unless(Auth::user()->role === 'admin', 403);

        $validated = $request->validate([
            'field' => ['required', 'string', 'max:255'],
            'skill' => ['required', 'string', 'max:255'],
            'question_text' => ['required', 'string'],
            'difficulty' => ['nullable', 'string', 'max:100'],
        ]);

        Question::create([
            'field' => $validated['field'],
            'skill' => $validated['skill'],
            'question_text' => $validated['question_text'],
            'difficulty' => $validated['difficulty'] ?? 'متوسط',
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'تمت إضافة السؤال بنجاح.');
    })->name('admin.questions.store');

    // حذف سؤال اختبار
    Route::delete('/admin/questions/{question}', function (Question $question) {
        abort_unless(Auth::user()->role === 'admin', 403);

        $question->delete();

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'تم حذف السؤال بنجاح.');
    })->name('admin.questions.destroy');
});

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