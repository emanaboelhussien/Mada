<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب - منصة مدى</title>
    <!-- استدعاء خط تجوال -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!-- Font Awesome للأيقونات -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- ربط ملف الـ CSS الخاص بصفحة التسجيل -->
    <link rel="stylesheet" href="{{ asset('css/mada-register.css') }}">
</head>
<body class="register-body">

    <div class="register-card">
        <!-- زر العودة للرئيسية -->
        <div class="back-home">
            <a href="{{ url('/') }}">
                <i class="fas fa-arrow-right"></i> العودة للرئيسية
            </a>
        </div>

        <div class="brand-header">
            <h2>مدى</h2>
            <h3>إنشاء حساب جديد</h3>
        </div>

        <form action="#" method="POST">
            @csrf

  <!-- اختيار نوع الحساب (طالب أو خريج / جهة) -->
<div class="input-group">
    <label class="input-label">نوع الحساب</label>
    <div class="role-selector">
        <button type="button" class="role-btn active">طالب أو خريج</button>
        <button type="button" class="role-btn">جهة</button>
    </div>
</div>

            <!-- الاسم الكامل -->
            <div class="input-group">
                <label class="input-label" for="name">الاسم الكامل</label>
                <input type="text" id="name" name="name" class="text-input" placeholder="اسمك الكامل" required>
            </div>

            <!-- البريد الإلكتروني -->
            <div class="input-group">
                <label class="input-label" for="email">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" class="text-input" placeholder="name@example.com" required>
            </div>

            <!-- الجامعة -->
            <div class="input-group">
                <label class="input-label" for="university">الجامعة</label>
                <input type="text" id="university" name="university" class="text-input" placeholder="الجامعة الرئيسية | جامعة الأزهر | جامعة الأقصى | أخرى" required>
            </div>

            <!-- التخصص -->
            <div class="input-group">
                <label class="input-label" for="major">التخصص</label>
                <input type="text" id="major" name="major" class="text-input" placeholder="علم الحاسوب | تكنولوجيا المعلومات التطبيقية | جامعة أخرى" required>
            </div>

            <!-- المستوى الدراسي -->
            <div class="input-group">
                <label class="input-label" for="level">المستوى الدراسي</label>
                <input type="text" id="level" name="level" class="text-input" placeholder="سنة أولى | ثانية | ثالثة | رابعة | خريج" required>
            </div>

            <!-- كلمة المرور -->
            <div class="input-group">
                <label class="input-label" for="password">كلمة المرور</label>
                <input type="password" id="password" name="password" class="text-input" required>
            </div>

            <!-- تأكيد كلمة المرور -->
            <div class="input-group">
                <label class="input-label" for="password_confirmation">تأكيد كلمة المرور</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="text-input" required>
                <span class="input-hint">ملفك لا يظهر للجهات حتى تفعيل ذاتك بنفسك.</span>
            </div>

            <!-- زر إنشاء الحساب -->
            <button type="submit" class="submit-btn">إنشاء الحساب</button>

            <!-- رابط الانتقال لتسجيل الدخول -->
            <div class="login-redirect">
                لديك حساب؟ <a href="{{ route('login') }}">سجل دخولك</a>
            </div>
        </form>
    </div>

</body>
</html>