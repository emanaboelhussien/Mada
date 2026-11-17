<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ملفي الشخصي - منصة مدى</title>
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
            <a href="{{ route('student.profile') }}" class="nav-item active">
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
            <h1>ملفي الشخصي</h1>
        </header>

        <!-- بطاقة نموذج الملف الشخصي -->
        <div class="profile-card">
            <form action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label for="full_name">الاسم الكامل</label>
                    <input type="text" id="full_name" name="full_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="university">الجامعة</label>
                    <input type="text" id="university" name="university" class="form-control">
                </div>

                <div class="form-group">
                    <label for="major">التخصص</label>
                    <input type="text" id="major" name="major" class="form-control">
                </div>

                <div class="form-group">
                    <label for="academic_level">المستوى الدراسي</label>
                    <input type="text" id="academic_level" name="academic_level" class="form-control">
                </div>

                <div class="form-group">
                    <label for="bio">نبذة عنك</label>
                    <input type="text" id="bio" name="bio" class="form-control" placeholder="عرّف بنفسك في جملتين">
                </div>

                <div class="form-group">
                    <label for="portfolio">رابط أعمالك أو سيرتك الذاتية</label>
                    <input type="url" id="portfolio" name="portfolio" class="form-control ltr-input" placeholder="https://github.com/">
                </div>

                <div class="form-group">
                    <label for="email">البريد الإلكتروني</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="phone">رقم الهاتف (اختياري)</label>
                    <input type="tel" id="phone" name="phone" class="form-control">
                </div>

                <!-- قسم مهاراتي -->
                <div class="form-group skills-section">
                    <label>مهاراتي</label>
                    <p class="helper-text">تظهر هنا مستوياتك بعد أداء الاختبار</p>
                </div>

                <!-- صندوق إظهار ملفي للجهات -->
                <div class="visibility-box">
                    <div class="visibility-info">
                        <h4>إظهار ملفي للجهات</h4>
                        <p>عند التفعيل تستطيع الجهات الموثقة رؤية ملفك ونتيجة اختبارك وإرسال طلب تواصل. لا تظهر بيانات التواصل إلا بعد موافقتك.</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" name="is_visible" checked>
                        <span class="slider"></span>
                    </label>
                </div>

                <!-- أزرار الحفظ والإلغاء -->
                <div class="form-actions">
                    <button type="submit" class="btn-save">حفظ التغييرات</button>
                    <a href="{{ route('student.dashboard') }}" class="btn-cancel">إلغاء</a>
                </div>
            </form>
        </div>
    </main>
</div>

</body>
</html>