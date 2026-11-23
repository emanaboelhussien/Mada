<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحتي - منصة مدى</title>
    <!-- استدعاء خط تجوال -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome للأيقونات -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- ملف التنسيق الخاص بلوحة التحكم -->
    <link rel="stylesheet" href="{{ asset('css/mada-dashboard.css') }}">
</head>
<body>

@php
    $user = $user ?? Auth::user();
    $examCompleted = (bool) ($examCompleted ?? ($user->exam_completed ?? false));
    $examScore = $examScore ?? ($user->exam_score ?? null);
    $examLevel = $examLevel ?? ($user->exam_level ?? null);
    $examTrackName = $examTrackName ?? match ($user->exam_track ?? null) {
        'web' => 'تطوير الويب',
        'ai' => 'الذكاء الاصطناعي',
        default => 'تحديد المستوى',
    };

    $isVisible = (bool) ($isVisible ?? ($user->is_visible ?? false));
    $requestsCount = $requestsCount ?? 0;

    $hasBio = $hasBio ?? !empty($user->bio);
    $hasPortfolio = $hasPortfolio ?? !empty($user->portfolio);
    $completedSteps = ($examCompleted ? 1 : 0) + ($hasBio ? 1 : 0) + ($hasPortfolio ? 1 : 0);
    $completionPercent = $completionPercent ?? round(($completedSteps / 3) * 100);

    $scorePercent = ($examCompleted && !is_null($examScore))
        ? max(0, min(100, round(($examScore / 20) * 100)))
        : 0;

    $activities = $activities ?? collect();
@endphp

<div class="dashboard-wrapper">
    <!-- القائمة الجانبية (Sidebar) -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <h2>مدى</h2>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('student.dashboard') }}"
               class="nav-item {{ request()->routeIs('student.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i>
                <span>لوحتي</span>
            </a>
            <a href="{{ route('student.profile') }}"
               class="nav-item {{ request()->routeIs('student.profile*') ? 'active' : '' }}">
                <i class="far fa-user"></i>
                <span>ملفي الشخصي</span>
            </a>
            <a href="{{ route('student.exam') }}"
               class="nav-item {{ request()->routeIs('student.exam*') ? 'active' : '' }}">
                <i class="far fa-check-square"></i>
                <span>الاختبار</span>
            </a>
            <a href="{{ route('student.opportunities') }}"
               class="nav-item {{ request()->routeIs('student.opportunities*') ? 'active' : '' }}">
                <i class="fas fa-graduation-cap"></i>
                <span>التدريب والمنح</span>
            </a>
            <a href="{{ route('student.requests') }}"
               class="nav-item {{ request()->routeIs('student.requests*') ? 'active' : '' }}">
                <i class="far fa-envelope"></i>
                <span>الطلبات</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <!-- زر تسجيل الخروج الفعلي (ينهي الجلسة) -->
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="nav-item logout-link" style="width: 100%; background: none; border: none; cursor: pointer; text-align: right; font-family: inherit; font-size: inherit;">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>تسجيل الخروج</span>
                </button>
            </form>

            <!-- رابط العودة للصفحة الرئيسية -->
            <a href="{{ url('/') }}" class="nav-item">
                <i class="fas fa-home"></i>
                <span>العودة للرئيسية</span>
            </a>
        </div>
    </aside>

    <!-- المحتوى الرئيسي -->
    <main class="main-content">
        <header class="dashboard-header">
            <h1>أهلاً بك، {{ $user->name ?? 'طالب' }}</h1>
        </header>

        @if (session('success'))
            <div style="background: #E1F0EE; color: #116A64; border-right: 4px solid #116A64; padding: 0.9rem 1.2rem; border-radius: 10px; margin-bottom: 1.25rem; font-weight: 700;">
                {{ session('success') }}
            </div>
        @endif

        <!-- البطاقات الثلاث العلوية -->
        <section class="stats-grid">
            <div class="stat-card">
                <span class="stat-title">الاختبار</span>
                <strong class="stat-value">{{ $examCompleted ? 'مكتمل' : 'لم يُنجز بعد' }}</strong>
            </div>

            <div class="stat-card">
                <span class="stat-title">ظهور الملف للجهات</span>
                <strong class="stat-value">{{ $isVisible ? 'مفعل' : 'غير مفعل' }}</strong>
            </div>

            <div class="stat-card">
                <span class="stat-title">طلبات تواصل</span>
                <strong class="stat-value">{{ $requestsCount }}</strong>
            </div>
        </section>

        <!-- الشبكة السفلية (4 بطاقات تفاصيل) -->
        <section class="details-grid">
            <!-- بطاقة 1: نتيجة تحديد المستوى في المجال -->
            <div class="detail-card">
                <div class="card-header">
                    <h3>تحديد المستوى — {{ $examTrackName }}</h3>
                </div>

                @if ($examCompleted)
                    <div class="skills-list">
                        <div class="skill-item">
                            <div class="skill-info">
                                <span class="skill-name">النتيجة: {{ $examScore }} / 20</span>
                                <span class="skill-level">المستوى: {{ $examLevel }}</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ $scorePercent }}%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('student.exam') }}" class="card-link">إعادة الاختبار أو تغيير المجال</a>
                    </div>
                @else
                    <p class="card-subtitle" style="margin: 1rem 0;">
                        لم تقم بإجراء اختبار تحديد المستوى بعد (متاح في تطوير الويب والذكاء الاصطناعي من 20 سؤالاً).
                    </p>
                    <div class="card-footer">
                        <a href="{{ route('student.exam') }}" class="card-link">بدء اختبار تحديد المستوى</a>
                    </div>
                @endif
            </div>

            <!-- بطاقة 2: التدريب والمنح والدورات -->
            <div class="detail-card">
                <div class="card-header">
                    <h3>التدريب والمنح والدورات</h3>
                </div>
                <p class="card-subtitle" style="margin: 1rem 0;">
                    استعرض فرص التدريب الميداني، المنح الطلابية، والدورات المتاحة في منصة مدى.
                </p>
                <div class="card-footer">
                    <a href="{{ route('student.opportunities') }}" class="card-link">عرض كل الفرص</a>
                </div>
            </div>

            <!-- بطاقة 3: الخطوة التالية (نسبة الإكمال الحقيقية) -->
            <div class="detail-card">
                <div class="card-header">
                    <h3>الخطوة التالية</h3>
                    <p class="card-subtitle">أكمل ملفك لتزيد فرص ظهورك</p>
                </div>
                <div class="next-step-content">
                    <div class="circular-progress">
                        <span class="progress-value">{{ $completionPercent }}%</span>
                    </div>

                    <ul class="checklist">
                        <li class="{{ $examCompleted ? 'done' : 'pending' }}">
                            <i class="{{ $examCompleted ? 'fas fa-check-square' : 'far fa-square' }}"></i>
                            إجراء اختبار تحديد المستوى
                        </li>
                        <li class="{{ $hasBio ? 'done' : 'pending' }}">
                            <i class="{{ $hasBio ? 'fas fa-check-square' : 'far fa-square' }}"></i>
                            إضافة نبذة عنك
                        </li>
                        <li class="{{ $hasPortfolio ? 'done' : 'pending' }}">
                            <i class="{{ $hasPortfolio ? 'fas fa-check-square' : 'far fa-square' }}"></i>
                            رابط أعمالك
                        </li>
                    </ul>
                </div>
                <div class="card-action">
                    <a href="{{ route('student.profile') }}" class="btn-complete">أكمل ملفك</a>
                </div>
            </div>

            <!-- بطاقة 4: آخر النشاطات -->
            <div class="detail-card">
                <div class="card-header">
                    <h3>آخر النشاطات</h3>
                </div>
                <div class="activities-list">
                    @forelse ($activities as $activity)
                        <div class="activity-item">
                            <div class="activity-icon icon-teal"><i class="far fa-check-circle"></i></div>
                            <span class="activity-text">{{ $activity->title }}</span>
                            <span class="activity-time">{{ $activity->created_at ? \Carbon\Carbon::parse($activity->created_at)->diffForHumans() : 'الآن' }}</span>
                        </div>
                    @empty
                        <p class="card-subtitle" style="margin: 1rem 0;">
                            لا توجد نشاطات أو طلبات تواصل حتى الآن.
                        </p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
</div>

</body>
</html>