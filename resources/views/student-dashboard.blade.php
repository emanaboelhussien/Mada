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

<div class="dashboard-wrapper">
    <!-- القائمة الجانبية (Sidebar) -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <h2>مدى</h2>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('student.dashboard') }}" class="nav-item active">
                <i class="fas fa-th-large"></i>
                <span>لوحتي</span>
            </a>
            <a href="{{ route('student.profile') }}" class="nav-item">
                <i class="far fa-user"></i>
                <span>ملفي الشخصي</span>
            </a>
            <a href="{{ route('student.exam') }}" class="nav-item">
                <i class="far fa-check-square"></i>
                <span>الاختبار</span>
            </a>
            <a href="{{ route('student.opportunities') }}" class="nav-item">
                <i class="fas fa-graduation-cap"></i>
                <span>التدريب والمنح</span>
            </a>
            <a href="{{ route('student.requests') }}" class="nav-item">
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
            <h1>أهلاً بك، {{ Auth::user()->name ?? 'طالب' }}</h1>
        </header>

        <!-- البطاقات الثلاث العلوية -->
        <section class="stats-grid">
            <div class="stat-card">
                <span class="stat-title">الاختبار</span>
                <strong class="stat-value">مكتمل</strong>
            </div>

            <div class="stat-card">
                <span class="stat-title">ظهور الملف للجهات</span>
                <strong class="stat-value">مفعل</strong>
            </div>

            <div class="stat-card">
                <span class="stat-title">طلبات تواصل</span>
                <strong class="stat-value">3</strong>
            </div>
        </section>

        <!-- الشبكة السفلية (4 بطاقات تفاصيل) -->
        <section class="details-grid">
            <!-- بطاقة 1: نتيجتك في المجال -->
            <div class="detail-card">
                <div class="card-header">
                    <h3>نتيجتك في (اسم المجال)</h3>
                </div>
                <div class="skills-list">
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">HTML, CSS</span>
                            <span class="skill-level">متقدم</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 85%;"></div>
                        </div>
                    </div>

                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">JavaScript</span>
                            <span class="skill-level">متوسط</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 55%;"></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="card-link">عرض النتيجة كاملة</a>
                </div>
            </div>

            <!-- بطاقة 2: فرص جديدة -->
            <div class="detail-card">
                <div class="card-header">
                    <h3>فرص جديدة</h3>
                </div>
                <div class="opportunities-list">
                    <div class="opportunity-item">
                        <div class="opp-info">
                            <h4>تدريب ميداني - اسم الجهة</h4>
                        </div>
                        <span class="badge badge-open">مفتوحة</span>
                    </div>

                    <div class="opportunity-item">
                        <div class="opp-info">
                            <h4>منحة دراسية - اسم الجهة</h4>
                        </div>
                        <span class="badge badge-soon">تنتهي قريباً</span>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('student.opportunities') }}" class="card-link">عرض كل الفرص</a>
                </div>
            </div>

            <!-- بطاقة 3: الخطوة التالية (نسبة الإكمال) -->
            <div class="detail-card">
                <div class="card-header">
                    <h3>الخطوة التالية</h3>
                    <p class="card-subtitle">أكمل ملفك لتزيد فرص ظهورك</p>
                </div>
                <div class="next-step-content">
                    <!-- الدائرة التقدمية -->
                    <div class="circular-progress">
                        <span class="progress-value">70%</span>
                    </div>

                    <!-- قائمة المهام -->
                    <ul class="checklist">
                        <li class="done"><i class="fas fa-check-square"></i> إجراء الاختبار</li>
                        <li class="done"><i class="fas fa-check-square"></i> إضافة نبذة عنك</li>
                        <li class="pending"><i class="far fa-square"></i> رابط أعمالك</li>
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
                    <div class="activity-item">
                        <div class="activity-icon icon-teal"><i class="far fa-envelope"></i></div>
                        <span class="activity-text">(اسم الجهة) طلبت التواصل معك</span>
                        <span class="activity-time">اليوم</span>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon icon-teal"><i class="far fa-check-circle"></i></div>
                        <span class="activity-text">أنهيت اختبار (اسم المجال)</span>
                        <span class="activity-time">أمس</span>
                    </div>

                    <div class="activity-item">
                        <div class="activity-icon icon-orange"><i class="far fa-clock"></i></div>
                        <span class="activity-text">منحة تنتهي بعد 3 أيام</span>
                        <span class="activity-time">قبل يومين</span>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

</body>
</html>