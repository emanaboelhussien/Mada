<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم الجهة - منصة مدى</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/entity-dashboard.css') }}">
</head>
<body>

<div class="dashboard-wrapper">
    <!-- القائمة الجانبية -->
    <aside class="sidebar">
        <div>
            <div class="sidebar-logo">
                <h2>مدى</h2>
                <span class="entity-role-badge">حساب جهة</span>
            </div>

            <nav class="sidebar-nav">
                <a href="#" class="nav-item active">
                    <i class="fas fa-th-large"></i>
                    <span>لوحة الجهة</span>
                </a>
              <a href="{{ route('entity.students') }}" class="nav-item">
                    <i class="fas fa-user-graduate"></i>
                    <span>الطلاب المتاحون</span>
                </a>


               <a href="{{ route('entity.requests') }}" class="nav-item">
    <i class="far fa-paper-plane"></i>
    <span>طلبات التواصل</span>
</a>
               <a href="{{ route('entity.profile') }}" class="nav-item">
        <i class="far fa-building"></i>
        <span>ملف الجهة</span>
    </a>
            </nav>
        </div>

        <div class="sidebar-footer">
            <a href="{{ url('/') }}" class="nav-item">
                <i class="fas fa-home"></i>
                <span>العودة للرئيسية</span>
            </a>

            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>تسجيل الخروج</span>
                    </button>
                </form>
            @endauth
        </div>
    </aside>

    <!-- المحتوى الرئيسي -->
    <main class="main-content">
        <header class="dashboard-header">
            <div>
                <h1>أهلاً بكِ في لوحة الجهة</h1>
                <p>تابعي الكفاءات الطلابية المتاحة، وأديري فرص التدريب والمنح والدورات وطلبات التواصل.</p>
            </div>
        </header>

        <!-- بطاقات الإحصاءات -->
        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-title">الطلاب الظاهرون</span>
                    <span class="stat-icon"><i class="fas fa-users"></i></span>
                </div>
                <div class="stat-value">0</div>
                <div class="stat-note">ملفات مفعّلة للظهور للجهات</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-title">الفرص والدورات</span>
                    <span class="stat-icon"><i class="fas fa-graduation-cap"></i></span>
                </div>
                <div class="stat-value">0</div>
                <div class="stat-note">تدريب، منح، أو دورات</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-title">طلبات التواصل</span>
                    <span class="stat-icon"><i class="far fa-envelope-open"></i></span>
                </div>
                <div class="stat-value">0</div>
                <div class="stat-note">طلبات مرسلة للطلاب</div>
            </div>

            <div class="stat-card">
                <div class="stat-top">
                    <span class="stat-title">الموافقات</span>
                    <span class="stat-icon"><i class="far fa-check-circle"></i></span>
                </div>
                <div class="stat-value">0</div>
                <div class="stat-note">طلاب وافقوا على مشاركة التواصل</div>
            </div>
        </section>

        <!-- أقسام العمل -->
        <section class="panel-grid">
            <div class="panel-card">
                <div class="panel-header">
                    <h2>أحدث الطلاب المتاحين</h2>
                    <a href="#" class="panel-link">عرض الكل</a>
                </div>

                <div class="student-item">
                    <div class="student-meta">
                        <h3>طالب نموذجي - تكنولوجيا المعلومات</h3>
                        <p>الجامعة • المستوى الرابع • جاهز للتدريب العملي</p>
                    </div>
                    <span class="badge-level">متاح للتواصل</span>
                </div>

                <div class="student-item">
                    <div class="student-meta">
                        <h3>طالبة نموذجية - علوم الحاسوب</h3>
                        <p>الجامعة • المستوى الثالث • مهتمة بالمنح والدورات</p>
                    </div>
                    <span class="badge-level">ملف مفعّل</span>
                </div>
            </div>

            <div class="panel-card">
                <div class="panel-header">
                    <h2>إجراءات سريعة للجهة</h2>
                </div>

                <div class="quick-actions">
                    <div class="action-box">
                        <div>
                            <h3>استعراض ملفات الطلاب</h3>
                            <p>تصفّحي الطلاب الذين فعّلوا خيار إظهار ملفهم للجهات.</p>
                        </div>
                        <a href="#" class="btn-outline">استعراض</a>
                    </div>

                    <div class="action-box">
                        <div>
                            <h3>تحديث بيانات الجهة</h3>
                            <p>عدّلي اسم الجهة والنبذة ورابط التواصل الرسمي.</p>
                        </div>
                        <a href="#" class="btn-outline">تعديل</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

</body>
</html>