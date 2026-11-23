<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اختبار تحديد المستوى - منصة مدى</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/mada-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mada-exam.css') }}">
</head>
<body>

@php
    $user = $user ?? Auth::user();
@endphp

<div class="dashboard-wrapper">
    <!-- القائمة الجانبية -->
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
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="nav-item logout-link logout-btn-reset">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>تسجيل الخروج</span>
                </button>
            </form>

            <a href="{{ url('/') }}" class="nav-item">
                <i class="fas fa-home"></i>
                <span>العودة للرئيسية</span>
            </a>
        </div>
    </aside>

    <!-- المحتوى الرئيسي -->
    <main class="main-content">
        @if (!$selectedTrack)
            <!-- المرحلة 1: اختيار المجال قبل بدء الاختبار -->
            <header class="dashboard-header">
                <h1>اختبار تحديد المستوى</h1>
            </header>

            @if ($user && $user->exam_completed)
                <div class="previous-result-banner">
                    <strong>نتيجتك الحالية المسجلة:</strong>
                    المجال: {{ $user->exam_track === 'ai' ? 'الذكاء الاصطناعي' : 'تطوير الويب' }} |
                    الدرجة: {{ $user->exam_score }} / 20 |
                    المستوى: {{ $user->exam_level }}
                </div>
            @endif

            <p class="exam-intro-text">
                اختر المجال الذي ترغب في تحديد مستواك فيه. يتكون كل اختبار من <strong>20 سؤالاً</strong> ومدة <strong>20 دقيقة</strong>، وعند انتهاء الوقت يتم تسليم إجاباتك تلقائياً.
            </p>

            <div class="tracks-selection-grid">
                <div class="track-choice-card">
                    <div>
                        <div class="track-icon"><i class="fas fa-code"></i></div>
                        <h3>تطوير الويب (Web Development)</h3>
                        <p class="track-meta">
                            يشمل أساسيات HTML، CSS، JavaScript، وقواعد Laravel وقواعد البيانات.<br>
                            <strong>عدد الأسئلة:</strong> 20 سؤالاً &bull; <strong>المدة:</strong> 20 دقيقة
                        </p>
                    </div>
                    <a href="{{ route('student.exam', ['track' => 'web']) }}" class="btn-start-track">
                        بدء اختبار تطوير الويب
                    </a>
                </div>

                <div class="track-choice-card">
                    <div>
                        <div class="track-icon"><i class="fas fa-brain"></i></div>
                        <h3>الذكاء الاصطناعي (AI)</h3>
                        <p class="track-meta">
                            يشمل مفاهيم التعلم الآلي، تحليل البيانات، الشبكات العصبية، ومعالجة اللغات.<br>
                            <strong>عدد الأسئلة:</strong> 20 سؤالاً &bull; <strong>المدة:</strong> 20 دقيقة
                        </p>
                    </div>
                    <a href="{{ route('student.exam', ['track' => 'ai']) }}" class="btn-start-track">
                        بدء اختبار الذكاء الاصطناعي
                    </a>
                </div>
            </div>

        @else
            <!-- المرحلة 2: عرض أسئلة المجال المختار مع العداد التنازلي -->
            @php
                $currentTrackData = $bank[$selectedTrack];
                $questions = $currentTrackData['questions'];
            @endphp

            <header class="dashboard-header">
                <h1>اختبار تحديد المستوى — {{ $currentTrackData['title'] }}</h1>
            </header>

            <div class="timer-sticky-bar">
                <div>
                    <strong>المجال:</strong> {{ $currentTrackData['title'] }} (20 سؤالاً)
                </div>
                <div id="timerBox" class="timer-badge">
                    <i class="far fa-clock"></i>
                    <span>الوقت المتبقي: <strong id="timerDisplay">20:00</strong></span>
                </div>
            </div>

            <form id="examForm" action="{{ route('student.exam.submit') }}" method="POST">
                @csrf
                <input type="hidden" name="track" value="{{ $selectedTrack }}">

                @foreach ($questions as $question)
                    <div class="question-card">
                        <div class="question-title">
                            {{ $question['id'] }}. {{ $question['q'] }}
                        </div>
                        <div class="options-grid">
                            @foreach ($question['options'] as $key => $optionText)
                                <label class="option-label">
                                    <input type="radio"
                                           name="answers[{{ $question['id'] }}]"
                                           value="{{ $key }}">
                                    <span>{{ $optionText }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <div class="submit-exam-bar">
                    <a href="{{ route('student.exam') }}" class="btn-back-tracks">
                        &rarr; إلغاء والعودة لاختيار المجال
                    </a>
                    <button type="submit" class="btn-submit-exam">
                        <i class="fas fa-paper-plane"></i> إنهاء وحفظ النتيجة
                    </button>
                </div>
            </form>

            <script>
                (function () {
                    let remainingSeconds = 20 * 60;
                    const timerDisplay = document.getElementById('timerDisplay');
                    const timerBox = document.getElementById('timerBox');
                    const examForm = document.getElementById('examForm');
                    let isSubmitting = false;

                    examForm.addEventListener('submit', function () {
                        isSubmitting = true;
                    });

                    const interval = setInterval(function () {
                        remainingSeconds--;

                        if (remainingSeconds <= 180) {
                            timerBox.classList.add('warning');
                        }

                        if (remainingSeconds <= 0) {
                            clearInterval(interval);
                            timerDisplay.textContent = '00:00';
                            if (!isSubmitting) {
                                isSubmitting = true;
                                alert('انتهى وقت الاختبار! سيتم تسليم إجاباتك وحساب نتيجتك الآن.');
                                examForm.submit();
                            }
                            return;
                        }

                        const minutes = Math.floor(remainingSeconds / 60);
                        const seconds = remainingSeconds % 60;
                        timerDisplay.textContent =
                            String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');
                    }, 1000);
                })();
            </script>
        @endif
    </main>
</div>

</body>
</html>