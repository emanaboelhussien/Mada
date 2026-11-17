<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>التدريب و المنح - منصة مدى</title>
    <!-- استدعاء خط تجوال -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome للأيقونات -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- ملف التنسيق المشترك للوحة التحكم -->
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
            <a href="{{ route('student.dashboard') }}" class="nav-item">
                <i class="fas fa-th-large"></i>
                <span>لوحتي</span>
            </a>
            <a href="{{ route('student.profile') }}" class="nav-item">
                <i class="far fa-user"></i>
                <span>ملفي الشخصي</span>
            <a href="{{ route('student.exam') }}" class="nav-item">
    <i class="far fa-check-square"></i>
    <span>الاختبار</span>
</a>
            <a href="{{ route('student.opportunities') }}" class="nav-item active">
                <i class="fas fa-graduation-cap"></i>
                <span>التدريب والمنح</span>
            <a href="{{ route('student.requests') }}" class="nav-item">
    <i class="far fa-envelope"></i>
    <span>الطلبات</span>
</a>
        </nav>

        <div class="sidebar-footer">
            <a href="{{ url('/') }}" class="nav-item logout-link">
                <i class="fas fa-sign-out-alt"></i>
                <span>العودة للرئيسية</span>
            </a>
        </div>
    </aside>

    <!-- المحتوى الرئيسي -->
    <main class="main-content">
        <header class="dashboard-header">
            <h1>التدريب و المنح</h1>
        </header>

        <!-- قسم البحث والتصفية (Filters) -->
        <div class="filter-section">
            <div class="search-box">
                <input type="text" class="search-input" placeholder="ابحث عن فرصة">
            </div>

            <div class="filter-controls">
                <div class="filter-tabs">
                    <button type="button" class="filter-tab active">الكل</button>
                    <button type="button" class="filter-tab">تدريب ميداني</button>
                    <button type="button" class="filter-tab">منح</button>
                </div>

                <div class="filter-select-group">
                    <select class="filter-select">
                        <option value="">المجال، الحالة: مفتوحة/مغلقة</option>
                        <option value="web">تطوير الويب - مفتوحة</option>
                        <option value="ai">الذكاء الاصطناعي - مفتوحة</option>
                        <option value="closed">مغلقة</option>
                    </select>
                    <button type="button" class="btn-apply-filter">تطبيق</button>
                </div>
            </div>
        </div>

        <!-- شبكة بطاقات الفرص -->
        <div class="opportunities-grid">
            <!-- بطاقة 1: تدريب ميداني -->
            <div class="opp-card">
                <div class="opp-badges">
                    <span class="badge badge-type">تدريب ميداني</span>
                    <span class="badge badge-open">مفتوحة</span>
                </div>
                <h3 class="opp-title">متدرب تطوير ويب</h3>
                <div class="opp-meta">
                    <p>الجهة: اسم الجهة، المجال: تطوير الويب</p>
                    <p>آخر موعد للتقديم: 15/12/2026</p>
                    <p>آخر تحقق: 28/10/2026</p>
                </div>
                <div class="opp-footer">
                    <a href="#" class="btn-details">التفاصيل</a>
                </div>
            </div>

            <!-- بطاقة 2: منحة دراسية مفتوحة -->
            <div class="opp-card">
                <div class="opp-badges">
                    <span class="badge badge-type">منحة</span>
                    <span class="badge badge-open">مفتوحة</span>
                </div>
                <h3 class="opp-title">منحة دراسية (مثال)</h3>
                <div class="opp-meta">
                    <p>الجهة: اسم الجهة، المجال: تطوير الويب</p>
                    <p>آخر موعد للتقديم: 15/12/2026</p>
                    <p>آخر تحقق: 28/10/2026</p>
                </div>
                <div class="opp-footer">
                    <a href="#" class="btn-details">التفاصيل</a>
                </div>
            </div>

            <!-- بطاقة 3: منحة منتهية -->
            <div class="opp-card">
                <div class="opp-badges">
                    <span class="badge badge-type">منحة</span>
                    <span class="badge badge-closed">منتهية</span>
                </div>
                <h3 class="opp-title">منحة (مثال)</h3>
                <div class="opp-meta">
                    <p>الجهة: اسم الجهة، المجال: تطوير الويب</p>
                    <p>آخر موعد للتقديم: 15/12/2026</p>
                    <p>آخر تحقق: 28/10/2026</p>
                </div>
                <div class="opp-footer">
                    <a href="#" class="btn-details">التفاصيل</a>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>